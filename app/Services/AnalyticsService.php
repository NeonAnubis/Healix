<?php

namespace App\Services;

use App\Data\MockData;

class AnalyticsService
{
    public function getDashboardMetrics(int $doctorId): array
    {
        return MockData::dashboardStats();
    }

    public function getAdminMetrics(): array
    {
        return MockData::adminStats();
    }

    public function getPlatformStats(): array
    {
        return MockData::stats();
    }

    public function getRevenueReport(string $period = 'monthly'): array
    {
        $stats = MockData::adminStats();
        return $stats['monthly_revenue'];
    }

    public function getUserGrowthReport(): array
    {
        $stats = MockData::adminStats();
        return $stats['user_growth'];
    }
}
