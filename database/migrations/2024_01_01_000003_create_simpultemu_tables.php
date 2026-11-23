<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add role to users
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('email');
            $table->boolean('is_premium')->default(false)->after('role');
        });

        // Themes
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('tier', ['basic', 'premium'])->default('basic');
            $table->integer('price')->default(0);
            $table->text('description')->nullable();
            $table->string('preview_image')->nullable();
            $table->json('theme_config')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Music
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artist')->nullable();
            $table->string('file_path');
            $table->integer('duration')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Invitations
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('theme_id')->constrained()->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->string('groom_name');
            $table->string('groom_nickname')->nullable();
            $table->string('bride_name');
            $table->string('bride_nickname')->nullable();
            $table->date('event_date');
            $table->time('event_time');
            $table->string('venue');
            $table->text('address')->nullable();
            $table->text('maps_url')->nullable();
            $table->text('quran_text')->nullable();
            $table->text('quran_translation')->nullable();
            $table->string('quote_source')->nullable();
            $table->date('akad_date')->nullable();
            $table->time('akad_time')->nullable();
            $table->string('akad_venue')->nullable();
            $table->text('akad_address')->nullable();
            $table->foreignId('music_id')->nullable()->constrained('music')->nullOnDelete();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        // Invitation Photos
        Schema::create('invitation_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->constrained()->cascadeOnDelete();
            $table->string('path');
            $table->string('slot')->nullable();
            $table->integer('sort_order')->default(0);
            $table->string('alt_text')->nullable();
            $table->timestamps();
        });

        // Invitation Guests
        Schema::create('invitation_guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('category')->nullable();
            $table->string('unique_token')->unique();
            $table->text('invitation_url')->nullable();
            $table->text('whatsapp_message')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('opened_at')->nullable();
            $table->enum('rsvp_status', ['pending', 'confirmed', 'declined', 'maybe'])->default('pending');
            $table->timestamps();
        });

        // RSVPs
        Schema::create('rsvps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('invitation_guest_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->enum('attendance', ['hadir', 'tidak_hadir', 'masih_ragu']);
            $table->integer('guest_count')->default(1);
            $table->text('message')->nullable();
            $table->timestamps();
        });

        // Comments
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('message');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });

        // Gift Accounts
        Schema::create('gift_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->constrained()->cascadeOnDelete();
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('account_holder');
            $table->timestamps();
        });

        // Payments
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('invitation_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('amount');
            $table->enum('status', ['pending', 'paid', 'failed', 'expired'])->default('pending');
            $table->string('payment_reference')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('gift_accounts');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('rsvps');
        Schema::dropIfExists('invitation_guests');
        Schema::dropIfExists('invitation_photos');
        Schema::dropIfExists('invitations');
        Schema::dropIfExists('music');
        Schema::dropIfExists('themes');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'is_premium']);
        });
    }
};
