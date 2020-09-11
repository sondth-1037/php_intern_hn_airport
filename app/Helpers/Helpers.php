<?php

use App\Models\CarType;

if (!function_exists('calculatePrice')) {
    function calculatePrice($distance, $carTyeId, $provinceAirportId, $hour, $numPickup) {
        $budget = 0;
        $coefficient = 0;
        $combo = false;
    
        $carType = CarType::findOrFail($carTyeId);
        $carType = $carType->type;
        if ($distance <= config('constance.distance.tier_1')) {
            switch ($carType) {
                case config('constance.car.type_1'):
                    $coefficient = config('constance.price.tier_1.type_1');
                    break;
                case config('constance.car.type_2'):
                    $coefficient = config('constance.price.tier_1.type_2');
                    break;
                case config('constance.car.type_3'):
                    $coefficient = config('constance.price.tier_1.type_3');
                    break;
                case config('constance.car.type_4'):
                    $coefficient = config('constance.price.tier_1.type_4');
                    break;
                default:
                    return $budget;
                    break;
            }
        } elseif ($distance > config('constance.distance.tier_1') && $distance < config('constance.distance.tier_2')) {
            switch ($carType) {
                case config('constance.car.type_1'):
                    $coefficient = config('constance.price.tier_2.type_1');
                    break;
                case config('constance.car.type_2'):
                    $coefficient = config('constance.price.tier_2.type_2');
                    break;
                case config('constance.car.type_3'):
                    $coefficient = config('constance.price.tier_2.type_3');
                    break;
                case config('constance.car.type_4'):
                    $coefficient = config('constance.price.tier_2.type_4');
                    break;
                default:
                    return $budget;
                    break;
            }
        } elseif ($distance > config('constance.distance.tier_2') && $distance < config('constance.distance.tier_special')) {
            if ($provinceAirportId == config('constance.province_airport,HN')) {
                $combo = true;
                $budget = config('constance.price.tier_special.default');
                if ($numPickup > 1) {
                    switch ($carType) {
                        case config('constance.car.type_1'):
                            $coefficient = config('constance.price.tier_special.type_1');
                            break;
                        case config('constance.car.type_2'):
                            $coefficient = config('constance.price.tier_special.type_2');
                            break;
                        case config('constance.car.type_3'):
                            $coefficient = config('constance.price.tier_special.type_3');
                            break;
                        case config('constance.car.type_4'):
                            $coefficient = config('constance.price.tier_special.type_4');
                            break;
                        default:
                            break;
                    }
                    $budget += $numPickup * $coefficient;
                }
    
            } else {
                switch ($carType) {
                    case config('constance.car.type_1'):
                        $coefficient = config('constance.price.tier_3.type_1');
                        break;
                    case config('constance.car.type_2'):
                        $coefficient = config('constance.price.tier_3.type_2');
                        break;
                    case config('constance.car.type_3'):
                        $coefficient = config('constance.price.tier_3.type_3');
                        break;
                    case config('constance.car.type_4'):
                        $coefficient = config('constance.price.tier_3.type_4');
                        break;
                    default:
                        return $budget;
                        break;
                }
            }
        } else {
            switch ($carType) {
                case config('constance.car.type_1'):
                    $coefficient = config('constance.price.tier_3.type_1');
                    break;
                case config('constance.car.type_2'):
                    $coefficient = config('constance.price.tier_3.type_2');
                    break;
                case config('constance.car.type_3'):
                    $coefficient = config('constance.price.tier_3.type_3');
                    break;
                case config('constance.car.type_4'):
                    $coefficient = config('constance.price.tier_3.type_4');
                    break;
                default:
                    return $budget;
                    break;
            }
        }
        if (!$combo) {
            $budget = $coefficient * $distance;
            $budget =  $budget + $budget / config('constance.const.percent') * config('constance.const.fee_basic');
            if ((int)$hour > config('constance.time.condition_1') || (int)$hour < config('constance.time.condition_1')) {
                $budget = $budget + $budget / config('constance.const.percent') * config('constance.const.bonus_basic');
            }
        }
    
        return $budget;
    }
}
