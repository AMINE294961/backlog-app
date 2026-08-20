<?php

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('un utilisateur peut créer un projet', function () {

    $user = User::factory()->create([
        'role' => 'developpeur',
    ]);

    $project = Project::create([
        'name' => 'Projet Test',
        'description' => 'Projet créé avec un test automatisé',
        'owner_id' => $user->id,
    ]);

    expect($project)->not->toBeNull();

    $this->assertDatabaseHas('projects', [
        'name' => 'Projet Test',
        'owner_id' => $user->id,
    ]);
});