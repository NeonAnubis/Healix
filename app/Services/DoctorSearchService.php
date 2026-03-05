<?php

namespace App\Services;

use App\Data\MockData;

class DoctorSearchService
{
    public function search(array $filters = []): array
    {
        $doctors = collect(MockData::doctors());

        if (!empty($filters['specialty'])) {
            $doctors = $doctors->filter(fn($d) => 
                strtolower($d['specialty']) === strtolower($filters['specialty'])
            );
        }

        if (!empty($filters['location'])) {
            $doctors = $doctors->filter(fn($d) => 
                str_contains(strtolower($d['location']), strtolower($filters['location']))
            );
        }

        if (!empty($filters['available_today'])) {
            $doctors = $doctors->filter(fn($d) => $d['available_today']);
        }

        if (!empty($filters['min_rating'])) {
            $doctors = $doctors->filter(fn($d) => $d['rating'] >= $filters['min_rating']);
        }

        if (!empty($filters['max_fee'])) {
            $doctors = $doctors->filter(fn($d) => $d['consultation_fee'] <= $filters['max_fee']);
        }

        if (!empty($filters['insurance'])) {
            $doctors = $doctors->filter(fn($d) => 
                in_array($filters['insurance'], $d['insurance'])
            );
        }

        $sortBy = $filters['sort'] ?? 'rating';
        $doctors = match ($sortBy) {
            'rating' => $doctors->sortByDesc('rating'),
            'reviews' => $doctors->sortByDesc('reviews_count'),
            'fee_low' => $doctors->sortBy('consultation_fee'),
            'fee_high' => $doctors->sortByDesc('consultation_fee'),
            'experience' => $doctors->sortByDesc('experience_years'),
            default => $doctors,
        };

        return $doctors->values()->all();
    }

    public function findBySlug(string $slug): ?array
    {
        return collect(MockData::doctors())->firstWhere('slug', $slug);
    }

    public function getRelated(string $specialty, string $excludeSlug, int $limit = 3): array
    {
        return collect(MockData::doctors())
            ->where('specialty', $specialty)
            ->where('slug', '!=', $excludeSlug)
            ->take($limit)
            ->values()
            ->all();
    }
}
