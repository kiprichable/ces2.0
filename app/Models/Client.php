<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
*/
class Client extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    

    public function lastPlaceOfResidence()
    {
        return [
            'outside/park/Camp' => 'outside/park/Camp',
            'Emergency or DV shelter' => 'Emergency or DV shelter',
            'Own Apartment/House/trailer' => 'Own Apartment/House/trailer',
            'Shed/Garage or Building' => 'Shed/Garage or Building',
            'Vehicle' => 'Vehicle',
            'Motel paid by Agency' => 'Motel paid by Agency',
            'Motel paid by self/family/friend' => 'Motel paid by self/family/friend',
            'Family/Friend house' => 'Family/Friend house',
            'Hospital or Treatment facility' => 'Hospital or Treatment facility',
            'Jail,Prison/Detention' => 'Jail,Prison/Detention',
            'other' => 'other',

        ];
    }
}
