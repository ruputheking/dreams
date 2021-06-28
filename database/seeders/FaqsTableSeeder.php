<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            [
                'question' => 'What do you mean by item and end product?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia dolor rerum enim doloremque iusto eos atque tempora dignissimos similique, quae, maxime sit accusantium delectus, maiores
                    officiis vitae fuga sunt repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem quibusdam commodi inventore laborum libero officiis',
                'name' => 'Rupesh Chaudhary',
                'email' => 'rupeschaudhary7338@gmail.com',
                'phone' => '9880227545',
                'status' => 1
            ],
            [
                'question' => 'What are some examples of permitted end products?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia dolor rerum enim doloremque iusto eos atque tempora dignissimos similique, quae, maxime sit accusantium delectus, maiores
                    officiis vitae fuga sunt repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem quibusdam commodi inventore laborum libero officiis',
                'name' => 'Rupesh Chaudhary',
                'email' => 'rupeschaudhary7338@gmail.com',
                'phone' => '9880227545',
                'status' => 1
            ],
            [
                'question' => 'Am I allowed to modify the item that I purchased?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia dolor rerum enim doloremque iusto eos atque tempora dignissimos similique, quae, maxime sit accusantium delectus, maiores
                    officiis vitae fuga sunt repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem quibusdam commodi inventore laborum libero officiis',
                'name' => 'Rupesh Chaudhary',
                'email' => 'rupeschaudhary7338@gmail.com',
                'phone' => '9880227545',
                'status' => 1
            ],
            [
                'question' => 'What does non-exclusive mean?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia dolor rerum enim doloremque iusto eos atque tempora dignissimos similique, quae, maxime sit accusantium delectus, maiores
                    officiis vitae fuga sunt repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem quibusdam commodi inventore laborum libero officiis',
                'name' => 'Rupesh Chaudhary',
                'email' => 'rupeschaudhary7338@gmail.com',
                'phone' => '9880227545',
                'status' => 1
            ],

            [
                'question' => 'What is a single application?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia dolor rerum enim doloremque iusto eos atque tempora dignissimos similique, quae, maxime sit accusantium delectus, maiores
                    officiis vitae fuga sunt repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem quibusdam commodi inventore laborum libero officiis',
                'name' => 'Rupesh Chaudhary',
                'email' => 'rupeschaudhary7338@gmail.com',
                'phone' => '9880227545',
                'status' => 1
            ],
        ]);
    }
}
