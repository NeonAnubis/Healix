<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Moderator = 'moderator';
    case Doctor = 'doctor';
    case Patient = 'patient';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Administrator',
            self::Moderator => 'Moderator',
            self::Doctor => 'Healthcare Professional',
            self::Patient => 'Patient',
        };
    }

    public function permissions(): array
    {
        return match ($this) {
            self::Admin => [
                'manage_users', 'manage_doctors', 'manage_clinics',
                'view_reports', 'manage_settings', 'moderate_reviews',
                'manage_roles', 'view_analytics', 'export_data',
            ],
            self::Moderator => [
                'manage_doctors', 'manage_clinics', 'moderate_reviews',
                'view_reports', 'view_analytics',
            ],
            self::Doctor => [
                'manage_own_profile', 'view_appointments', 'manage_schedule',
                'view_patients', 'respond_reviews',
            ],
            self::Patient => [
                'book_appointments', 'write_reviews', 'manage_own_profile',
                'view_doctors', 'view_clinics',
            ],
        };
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->permissions());
    }
}
