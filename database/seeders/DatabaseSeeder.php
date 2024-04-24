<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create(); 

          Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        
        Post::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Nuza Nadenta',
        //     'email' => 'nuza11@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Fariq Albi',
        //     'email' => 'fariq123@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        // User::create([
        //     'name' => 'Fefen Efendi',
        //     'email' => 'fefen@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        // User::create([
        //     'name' => 'Siti Khotimah',
        //     'email' => 'siti@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

      


        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea odio maxime quo nobis consequuntur! Dignissimos quas sed inventore aperiam hic quae architecto modi doloribus',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea odio maxime quo nobis consequuntur! Dignissimos quas sed inventore aperiam hic quae architecto modi doloribus, consectetur maxime reiciendis sapiente ut adipisci obcaecati quidem, voluptate enim, ea repellat tempora quaerat quasi debitis voluptatum harum odit? Sint quidem ratione iusto iste. Eum, accusantium porro numquam laborum illum eaque, soluta debitis dignissimos veritatis sequi, repellendus aliquam assumenda iste quod cupiditate maiores. Aut accusantium blanditiis nam consequatur hic iure iusto excepturi architecto, qui aspernatur! Hic, ad consectetur ut, reiciendis illo culpa neque ipsa voluptate corporis minus aut asperiores delectus! Officia ad soluta illo autem voluptatem.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae at tenetur natus illum laborum dicta? Voluptate quisquam veniam, maxime sunt nostrum quo rem perferendis architecto cupiditate. Architecto voluptatem corrupti magnam voluptate amet nobis a quibusdam, officia nulla ducimus illo laboriosam repudiandae dolores iure nemo quo quae eligendi. Similique nemo magni ipsum blanditiis. Saepe pariatur voluptatum dolorum, libero reprehenderit, facere recusandae minima magnam ut modi, nisi vitae? Culpa ea obcaecati voluptatum eos dolores tempore quis ad exercitationem! Porro laborum laboriosam officiis ipsum cupiditate beatae asperiores accusamus quaerat, quod illo facere tenetur perspiciatis id. Dolorem animi distinctio perferendis, quasi repudiandae atque saepe.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create ([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea odio maxime quo nobis consequuntur! Dignissimos quas sed inventore aperiam hic quae architecto modi doloribus',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea odio maxime quo nobis consequuntur! Dignissimos quas sed inventore aperiam hic quae architecto modi doloribus, consectetur maxime reiciendis sapiente ut adipisci obcaecati quidem, voluptate enim, ea repellat tempora quaerat quasi debitis voluptatum harum odit? Sint quidem ratione iusto iste. Eum, accusantium porro numquam laborum illum eaque, soluta debitis dignissimos veritatis sequi, repellendus aliquam assumenda iste quod cupiditate maiores. Aut accusantium blanditiis nam consequatur hic iure iusto excepturi architecto, qui aspernatur! Hic, ad consectetur ut, reiciendis illo culpa neque ipsa voluptate corporis minus aut asperiores delectus! Officia ad soluta illo autem voluptatem.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae at tenetur natus illum laborum dicta? Voluptate quisquam veniam, maxime sunt nostrum quo rem perferendis architecto cupiditate. Architecto voluptatem corrupti magnam voluptate amet nobis a quibusdam, officia nulla ducimus illo laboriosam repudiandae dolores iure nemo quo quae eligendi. Similique nemo magni ipsum blanditiis. Saepe pariatur voluptatum dolorum, libero reprehenderit, facere recusandae minima magnam ut modi, nisi vitae? Culpa ea obcaecati voluptatum eos dolores tempore quis ad exercitationem! Porro laborum laboriosam officiis ipsum cupiditate beatae asperiores accusamus quaerat, quod illo facere tenetur perspiciatis id. Dolorem animi distinctio perferendis, quasi repudiandae atque saepe.</p>',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
        // Post::create ([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea odio maxime quo nobis consequuntur! Dignissimos quas sed inventore aperiam hic quae architecto modi doloribus',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea odio maxime quo nobis consequuntur! Dignissimos quas sed inventore aperiam hic quae architecto modi doloribus, consectetur maxime reiciendis sapiente ut adipisci obcaecati quidem, voluptate enim, ea repellat tempora quaerat quasi debitis voluptatum harum odit? Sint quidem ratione iusto iste. Eum, accusantium porro numquam laborum illum eaque, soluta debitis dignissimos veritatis sequi, repellendus aliquam assumenda iste quod cupiditate maiores. Aut accusantium blanditiis nam consequatur hic iure iusto excepturi architecto, qui aspernatur! Hic, ad consectetur ut, reiciendis illo culpa neque ipsa voluptate corporis minus aut asperiores delectus! Officia ad soluta illo autem voluptatem.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae at tenetur natus illum laborum dicta? Voluptate quisquam veniam, maxime sunt nostrum quo rem perferendis architecto cupiditate. Architecto voluptatem corrupti magnam voluptate amet nobis a quibusdam, officia nulla ducimus illo laboriosam repudiandae dolores iure nemo quo quae eligendi. Similique nemo magni ipsum blanditiis. Saepe pariatur voluptatum dolorum, libero reprehenderit, facere recusandae minima magnam ut modi, nisi vitae? Culpa ea obcaecati voluptatum eos dolores tempore quis ad exercitationem! Porro laborum laboriosam officiis ipsum cupiditate beatae asperiores accusamus quaerat, quod illo facere tenetur perspiciatis id. Dolorem animi distinctio perferendis, quasi repudiandae atque saepe.</p>',
        //     'category_id' => 2,
        //     'user_id' => 3
        // ]);
        // Post::create ([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea odio maxime quo nobis consequuntur! Dignissimos quas sed inventore aperiam hic quae architecto modi doloribus',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea odio maxime quo nobis consequuntur! Dignissimos quas sed inventore aperiam hic quae architecto modi doloribus, consectetur maxime reiciendis sapiente ut adipisci obcaecati quidem, voluptate enim, ea repellat tempora quaerat quasi debitis voluptatum harum odit? Sint quidem ratione iusto iste. Eum, accusantium porro numquam laborum illum eaque, soluta debitis dignissimos veritatis sequi, repellendus aliquam assumenda iste quod cupiditate maiores. Aut accusantium blanditiis nam consequatur hic iure iusto excepturi architecto, qui aspernatur! Hic, ad consectetur ut, reiciendis illo culpa neque ipsa voluptate corporis minus aut asperiores delectus! Officia ad soluta illo autem voluptatem.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae at tenetur natus illum laborum dicta? Voluptate quisquam veniam, maxime sunt nostrum quo rem perferendis architecto cupiditate. Architecto voluptatem corrupti magnam voluptate amet nobis a quibusdam, officia nulla ducimus illo laboriosam repudiandae dolores iure nemo quo quae eligendi. Similique nemo magni ipsum blanditiis. Saepe pariatur voluptatum dolorum, libero reprehenderit, facere recusandae minima magnam ut modi, nisi vitae? Culpa ea obcaecati voluptatum eos dolores tempore quis ad exercitationem! Porro laborum laboriosam officiis ipsum cupiditate beatae asperiores accusamus quaerat, quod illo facere tenetur perspiciatis id. Dolorem animi distinctio perferendis, quasi repudiandae atque saepe.</p>',
        //     'category_id' => 2,
        //     'user_id' => 4
        // ]);
    }
}
