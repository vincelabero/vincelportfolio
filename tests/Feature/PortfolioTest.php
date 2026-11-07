<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortfolioTest extends TestCase
{
    public function test_portfolio_home_page_is_accessible(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSee('Marc Vincel A. Abero')
            ->assertSee('Data Center College of Bangued')
            ->assertSee('Divine Word College of Bangued')
            ->assertSee('Educational background')
            ->assertSee('Skills & Tools')
            ->assertSee('Web Development')
            ->assertSee('Backend & Databases')
            ->assertSee('Git & GitHub')
            ->assertSee('Certifications & Seminars')
            ->assertSee('Understanding Startups')
            ->assertSee('Startup Now Cordillera')
            ->assertSee('Online Safety Through Netiquette')
            ->assertSee('September 7, 2026')
            ->assertSee('certifications/startup-challenge-xi.jpg')
            ->assertSee('Students Document Request System for DCCP - Bangued')
            ->assertSee('View screenshots')
            ->assertSee('vincelabero/vincelportfolio');
    }

    public function test_dashboard_page_is_accessible(): void
    {
        $response = $this->get(route('dashboard'));

        $response->assertOk()
            ->assertSee('Portfolio readiness')
            ->assertSee('Skills & Tools')
            ->assertSee('12 skills')
            ->assertSee('Recent certificates and online learning')
            ->assertSee('3 credentials')
            ->assertSee('Students Document Request System for DCCP - Bangued')
            ->assertSee('View project')
            ->assertSee('No database');
    }

    public function test_project_detail_page_is_accessible(): void
    {
        $response = $this->get(route('project.show', 'students-document-request-system'));

        $response->assertOk()
            ->assertSee('Students Document Request System for DCCP - Bangued')
            ->assertSee('Screenshots')
            ->assertSee('screenshot-1.png');
    }

    public function test_unknown_project_returns_not_found(): void
    {
        $this->get('/projects/unknown-project')->assertNotFound();
    }

    public function test_health_endpoint_returns_ok(): void
    {
        $this->get('/health')
            ->assertOk()
            ->assertJson(['status' => 'ok']);
    }

    public function test_authentication_routes_are_not_registered(): void
    {
        $this->get('/login')->assertNotFound();
    }
}
