<?php

use Illuminate\Database\Seeder;

class MembershipTypeWriteUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = \App\MembershipTypes::where('code', 'STUDENT')->first();
        $student->Write_Up =
            <<<EOT
            Student membership is open to individuals with little or no practical procurement and supply chain
            management experience who are pursuing academic or professional studies at accredited institutions.
            The student member should be workng towards full membership.
EOT;
        $student->save();

        $licence = \App\MembershipTypes::where('code', 'LICENCE')->first();
        $licence->Write_Up =
            <<<EOT
            This class of membership is for those with experience in procurement and supply chain management, but 
            lacking professional qualifications;
EOT;
        $licence->save();

        $full_member = \App\MembershipTypes::where('code', 'MEMBER')->first();
        $full_member->Write_Up =
            <<<EOT
            The class of full membership is for individuals who have completed a course of professional study in
            procurement and supply chain management from an accredited institution.
EOT;
        $full_member->save();


     }
    
}
