<?php
/**
 * AddressService.php
 *
 * @copyright  2022 opencart.cn - All Rights Reserved
 * @link       http://www.guangdawangluo.com
 * @author     TL <mengwb@opencart.cn>
 * @created    2022-07-04 11:15:25
 * @modified   2022-07-04 11:15:25
 */

namespace Beike\Admin\Services;

use Beike\Models\Category;
use Beike\Models\CategoryPath;
use Beike\Repositories\AddressRepo;
use Beike\Repositories\CustomerRepo;
use Illuminate\Support\Facades\DB;

class AddressService
{
    public static function addForCustomer($customerId, $data)
    {
        $data = self::getParams($data);
        $data['customer_id'] = $customerId;
        $address = AddressRepo::create($data);
        return $address;
    }

    public static function update($addressId, $data)
    {
        $data = self::getParams($data);
        $address = AddressRepo::update($addressId, $data);
        return $address;
    }

    /**
     * @param $data
     * @return array
     */
    public static function getParams($data): array
    {
        $data = [
            'name' => $data['name'] ?? '',
            'phone' => $data['phone'] ?? '',
            'country_id' => (int)$data['country_id'] ?? 0,
            'zone_id' => (int)$data['zone_id'] ?? 0,
            'zone' => $data['zone'] ?? '',
            'city_id' => (int)$data['city_id'] ?? 0,
            'city' => $data['city'] ?? '',
            'zipcode' => $data['zipcode'] ?? '',
            'address_1' => $data['address_1'] ?? '',
            'address_2' => $data['address_2'] ?? '',
        ];
        return $data;
    }
}
