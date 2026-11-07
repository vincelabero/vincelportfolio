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
            ->assertSee('No projects published yet.')
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
            ->assertSee('The project list is empty for now.')
            ->assertSee('No database');
    }

    public function test_authentication_routes_are_not_registered(): void
    {
        $this->get('/login')->assertNotFound();
    }
}
