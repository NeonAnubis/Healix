<?php

namespace App\Services;

use App\Data\MockData;

class ClinicSearchService
{
    public function search(array $filters = []): array
    {
        $clinics = collect(MockData::clinics());

        if (!empty($filters['type'])) {
            $clinics = $clinics->filter(fn($c) => $c['type'] === $filters['type']);
        }

        if (!empty($filters['location'])) {
            $clinics = $clinics->filter(fn($c) => 
                str_contains(strtolower($c['location']), strtolower($filters['location']))
            );
        }

        if (!empty($filters['emergency'])) {
            $clinics = $clinics->filter(fn($c) => $c['emergency']);
        }

        if (!empty($filters['specialty'])) {
            $clinics = $clinics->filter(fn($c) => 
                in_array($filters['specialty'], $c['specialties'])
            );
        }

        return $clinics->values()->all();
    }

    public function findBySlug(string $slug): ?array
    {
        return collect(MockData::clinics())->firstWhere('slug', $slug);
    }
}
