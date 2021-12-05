<?php

namespace App\Console\Commands;

use App\Constants\Common;
use App\Repositories\Api\v1\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Backend\Interfaces\AdminRepositoryInterface;
use App\Repositories\Backend\Interfaces\CityRepositoryInterface;
use App\Repositories\Backend\Interfaces\CountryRepositoryInterface;
use App\Repositories\Backend\Interfaces\DistrictRepositoryInterface;
use App\Repositories\Backend\Interfaces\RoleRepositoryInterface;
use App\Traits\DataCities;
use App\Traits\DataDistricts;
use App\Traits\SlugString;
use Illuminate\Console\Command;

class Data extends Command
{
    use DataCities;
    use DataDistricts;
    use SlugString;

    const PASSWORD_CREATE_MOCK_DATA = '2f1ae28abb6cac4630292b7be2cb6fb2';
    const EMAIL_CREATE_MOCK_DATA = 'bibo051092@gmail.com';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make data.';

    /**
     * @var AdminRepositoryInterface
     */
    private $adminRepository;

    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;

    /**
     * @var CityRepositoryInterface
     */
    private $cityRepository;

    /**
     * @var CountryRepositoryInterface
     */
    private $countryRepository;

    /**
     * @var DistrictRepositoryInterface
     */
    private $districtRepository;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * Create a new command instance.
     *
     * @param AdminRepositoryInterface $adminRepository
     * @param RoleRepositoryInterface $roleRepository
     * @param CityRepositoryInterface $cityRepository
     * @param CountryRepositoryInterface $countryRepository
     * @param DistrictRepositoryInterface $districtRepository
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        AdminRepositoryInterface $adminRepository,
        RoleRepositoryInterface $roleRepository,
        CityRepositoryInterface $cityRepository,
        CountryRepositoryInterface $countryRepository,
        DistrictRepositoryInterface $districtRepository,
        CustomerRepositoryInterface $customerRepository
    )
    {
        parent::__construct();
        $this->adminRepository = $adminRepository;
        $this->roleRepository = $roleRepository;
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
        $this->districtRepository = $districtRepository;
        $this->customerRepository = $customerRepository;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (md5($this->secret('What is the password?')) !== self::PASSWORD_CREATE_MOCK_DATA) {
            $this->error('Something went wrong!');
            return false;
        }

        if ($this->adminRepository->isEmail(self::EMAIL_CREATE_MOCK_DATA)) {
            $this->info('Data exist.');
            return false;
        }

        $this->createRole();
        $this->createAdmin();
        $this->createCountries();
        $this->createCitiesAndDistricts();
        $this->createFactoryCustomer();

        $this->info('Success.');
        return true;
    }

    /**
     *  Create Admin
     */
    private function createAdmin()
    {
        $roleId = $this->roleRepository->getIdSpecialRole();

        $options = [
            'admin_first_name' => 'Hai',
            'admin_last_name' => 'Le',
            'admin_email' => self::EMAIL_CREATE_MOCK_DATA,
            'admin_password' => self::PASSWORD_CREATE_MOCK_DATA,
            'admin_phone' => '84947049292',
            'admin_role_id' => $roleId['role_id']
        ];

        $this->adminRepository->store($options);
    }

    /**
     *  Create Special Role
     */
    private function createRole()
    {
        $roles = [
            [
                'role_type' => Common::ROLE_ADMIN,
                'role_name' => 'Special Role'
            ],
            [
                'role_type' => Common::ROLE_CUSTOMER,
                'role_name' => 'Normal'
            ],
            [
                'role_type' => Common::ROLE_CUSTOMER,
                'role_name' => 'Loyal'
            ],
            [
                'role_type' => Common::ROLE_CUSTOMER,
                'role_name' => 'Partner'
            ]
        ];

        foreach ($roles as $role) {
            $options = [
                'role_type' => $role['role_type'],
                'role_name' => $role['role_name']
            ];

            $this->roleRepository->store($options);
        }
    }

    /**
     *  Create Factory Customer
     */
    private function createFactoryCustomer()
    {
        $country = $this->countryRepository->getCountryByCode('vi_VN');
        $city = $this->cityRepository->getCityByCode('01');
        $district = $this->districtRepository->getDistrictByCode('005');
        $role = $this->roleRepository->getRoleByName('Loyal');

        $options = [
            'customer_first_name' => 'M4rc0',
            'customer_last_name' => 'The Phoenix',
            'customer_email' => self::EMAIL_CREATE_MOCK_DATA,
            'customer_password' => self::PASSWORD_CREATE_MOCK_DATA,
            'customer_dob' => '1992-10-05',
            'customer_phone' => '84947049292',
            'customer_address' => 'Nhà 7, Ngõ 92/8/11 Nguyễn Khánh Toàn, Quan Hoa',
            'customer_district_id' => $district['district_id'],
            'customer_city_id' => $city['city_id'],
            'customer_country_id' => $country['country_id'],
            'customer_role_id' => $role['role_id']
        ];

        $this->customerRepository->store($options);
    }

    /**
     *  Create Countries
     */
    private function createCountries()
    {
        $options = [
            'country_code' => 'vi_VN',
            'country_name' => 'Việt Nam',
            'country_slug' => self::slugify('Việt Nam'),
        ];

        $this->countryRepository->store($options);
    }

    /**
     *  Create Cities, Districts
     */
    private function createCitiesAndDistricts()
    {
        $countryVn = $this->countryRepository->getCountryByCode('vi_VN');
        foreach (self::dataCities() as $city) {
            $cityArr = [
                'city_code' => $city['code'],
                'city_name' => $city['name_with_type'],
                'city_slug' => $city['slug'],
                'city_country_id' => $countryVn['country_id'],
            ];

            $this->cityRepository->store($cityArr);

            foreach (self::dataDistricts() as $district) {
                if ($district['parent_code'] === $city['code']) {
                    $cityByCode = $this->cityRepository->getCityByCode($city['code']);
                    $districtArr = [
                        'district_code' => $district['code'],
                        'district_name' => $district['name_with_type'],
                        'district_slug' => $district['slug'],
                        'district_city_id' => $cityByCode['city_id'],
                    ];

                    $this->districtRepository->store($districtArr);
                }
            }
        }
    }
}
