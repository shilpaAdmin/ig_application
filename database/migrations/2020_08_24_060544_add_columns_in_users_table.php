<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('title')->nullable()->after('name');
            $table->string('first_name')->nullable()->after('title');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('name_on_cheque')->nullable()->after('last_name');
            $table->date('date_of_birth')->nullable()->after('name_on_cheque');
            $table->enum('gender',['Male','Female'])->nullable()->after('date_of_birth');
            $table->string('blood_group')->nullable()->after('gender');
            $table->string('marital_status')->nullable()->after('blood_group');
            $table->date('anniversary_date')->nullable()->after('marital_status');
            $table->string('children')->nullable()->after('anniversary_date');
            $table->string('primary_email')->nullable()->after('children');
            $table->string('alternate_email')->nullable()->after('primary_email');
            $table->string('primary_contact_number')->nullable()->after('alternate_email');
            $table->string('alternate_contact_number')->nullable()->after('primary_contact_number');
            $table->text('current_address_line1')->nullable()->after('alternate_contact_number');
            $table->text('current_address_line2')->nullable()->after('current_address_line1');
            $table->string('current_nearby')->nullable()->after('current_address_line2');
            $table->string('current_area')->nullable()->after('current_nearby');
            $table->integer('current_city')->nullable()->after('current_area');
            $table->integer('current_zipcode')->nullable()->after('current_city');
            $table->enum('same_as_current',['Yes','No'])->default('No')->nullable()->after('current_zipcode');
            $table->text('permanent_address_line1')->nullable()->after('same_as_current');
            $table->text('permanent_address_line2')->nullable()->after('permanent_address_line1');
            $table->string('permanent_nearby')->nullable()->after('permanent_address_line2');
            $table->string('permanent_area')->nullable()->after('permanent_nearby');
            $table->integer('permanent_city')->nullable()->after('permanent_area');
            $table->integer('permanent_zipcode')->nullable()->after('permanent_city');
            $table->integer('company')->nullable()->after('permanent_zipcode');
            $table->integer('branch')->nullable()->after('company');
            $table->integer('user_type')->nullable()->after('branch');
            $table->integer('designation')->nullable()->after('user_type');
            $table->integer('department')->nullable()->after('designation');
            $table->integer('direct_manager')->nullable()->after('department');
            $table->integer('alternate_manager')->nullable()->after('direct_manager');
            $table->enum('manager',['Yes','No'])->default('No')->nullable()->after('alternate_manager');
            $table->enum('employee_status',['On Probation','Confirmed'])->default('On Probation')->nullable()->after('manager');
            $table->integer('bank_account_number')->nullable()->after('employee_status');
            $table->string('bank_name')->nullable()->after('bank_account_number');
            $table->string('ifsc_code')->nullable()->after('bank_name');
            $table->string('branch_name')->nullable()->after('ifsc_code');
            $table->string('pan_number')->nullable()->after('branch_name');
            $table->string('aadhar_number')->nullable()->after('pan_number');
            $table->string('pf_number')->nullable()->after('aadhar_number');
            $table->string('esic_number')->nullable()->after('pf_number');
            $table->string('uan_number')->nullable()->after('esic_number');
            $table->enum('professional_detail',['Freshes','Experienced'])->default('Freshes')->nullable()->after('uan_number');
            $table->string('hight_qualification')->nullable()->after('professional_detail');
            $table->string('total_experience')->nullable()->after('hight_qualification');
            $table->enum('pay_type',['Fixed','Hourly','Per Story'])->default('Fixed')->nullable()->after('total_experience');
            $table->integer('shift')->nullable()->after('pay_type');
            $table->string('gross_rate')->nullable()->after('shift');
            $table->integer('allowances_basic')->nullable()->after('gross_rate');
            $table->integer('allowances_hra')->nullable()->after('allowances_basic');
            $table->integer('allowances_transportation')->nullable()->after('allowances_hra');
            $table->integer('allowances_medical')->nullable()->after('allowances_transportation');
            $table->integer('allowances_knowledge_update')->nullable()->after('allowances_medical');
            $table->integer('allowances_lta')->nullable()->after('allowances_knowledge_update');
            $table->integer('allowances_pf')->nullable()->after('allowances_lta');
            $table->integer('allowances_esic')->nullable()->after('allowances_pf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
