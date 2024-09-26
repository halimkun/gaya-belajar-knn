<?php

namespace App\Helpers;

class LearningStyleHelper
{
    public static function determineLearningStyle($visual, $auditori, $kinestetik)
    {
        if ($visual > 6 && $auditori > 6 && $kinestetik <= 6) {
            return 'Vis-Aud';
        } elseif ($visual > 6 && $auditori <= 6 && $kinestetik > 6) {
            return 'Vis-Kin';
        } elseif ($auditori >= 6 && $visual <= 6 && $kinestetik >= 6) {
            return 'Aud-Kin';
        } elseif ($auditori >= 6 && $visual <= 6 && $kinestetik <= 6) {
            return 'Auditori';
        } elseif ($visual >= 6 && $auditori <= 6 && $kinestetik <= 6) {
            return 'Visual';
        } elseif ($auditori <= 6 && $visual <= 6 && $kinestetik > 6) {
            return 'Kinestetik';
        } else {
            return 'Lainnya';
        }
    }
}
