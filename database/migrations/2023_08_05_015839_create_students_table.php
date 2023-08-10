   <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('method');
                $table->string('user_type');
                $table->string('cuil')->unique();
                $table->string('firstname');
                $table->string('lastname');
                $table->string('work_email', 100)->unique();
                $table->string('ministerio');
                $table->string('reparticion');
                $table->string('contract_type')->nullable();
                $table->string('area')->nullable();
                $table->string('manager')->nullable();
                $table->string('email', 100)->unique()->nullable();
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();
                $table->string('regimen')->nullable();
                $table->string('provincia')->nullable();
                $table->string('active');
                $table->string('leave_date')->nullable();

                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('students');
        }
    };