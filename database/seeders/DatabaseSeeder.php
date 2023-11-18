<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Faq;
use App\Models\Cart;
use App\Models\User;
use App\Models\Review;
use App\Models\Address;
use App\Models\Product;
use App\Models\Category;
use App\Models\Platform;
use App\Models\ProductPurchase;
use App\Models\Purchase;
use App\Models\ReviewVote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        Address::factory(20)->create();
        Platform::insert([
            ['name' => 'Xbox'],
            ['name' => 'Nintendo Switch'],
            ['name' => 'Playstation'],
        ]);
        Product::factory(20)->create();
        Category::insert([
            ['name' => 'Action'],
            ['name' => 'Adventure'],
            ['name' => 'RPG'],
            ['name' => 'Simulation'],
            ['name' => 'Strategy'],
            ['name' => 'Sports'],
            ['name' => 'Racing'],
            ['name' => 'Puzzle'],
            ['name' => 'Horror'],
            ['name' => 'Fighting'],
        ]);
        for($i = 1; $i <= 20; $i++){
            $product = Product::find($i);

            $categories = Category::inRandomOrder()->limit(2)->pluck('id')->toArray();

            $product->categories()->attach($categories);
        } 
        Review::factory(20)->create();
        ReviewVote::factory(10)->create();
        Cart::factory(10)->create();
        for($i = 1; $i <= 20; $i++){
            $user = User::find($i);

            $products = Product::inRandomOrder()->limit(2)->pluck('id')->toArray();

            $user->wishlist()->attach($products);
        }
        Purchase::factory(20)->create();
        Faq::insert([
            [
                'question' => 'How can I reset my password?',
                'answer' => 'You can reset your password by clicking on the "Forgot Password" link on the login page. Follow the instructions in the email we send you to reset your password.'
            ],
        
            [
                'question' => 'What payment methods do you accept?', 
                'answer' => 'We accept major credit cards, including Visa, MasterCard, and American Express, as well as PayPal for online payments.'
            ],
        
            [
                'question' => 'Can I change my email address associated with my account?', 
                'answer' => 'Yes, you can update your email address in your account settings. Please make sure to verify your new email address for security purposes.'
            ],
        
            [
                'question' => 'Is there a return policy for physical products?', 
                'answer' => 'Yes, we have a return policy for physical products. Please review our return policy on our website for details and instructions.'
            ],
        
            [
                'question' => 'How do I redeem a game key or code?', 
                'answer' => 'To redeem a game key or code, go to your account settings and find the "Redeem Key" option. Enter your key or code, and the game will be added to your library.'
            ],
        
            [
                'question' => 'What are the system requirements for PC games?', 
                'answer' => 'System requirements can vary by game. Check the product page for the specific game to find information on its system requirements.'
            ],
        
            [
                'question' => 'Do you offer pre-orders for upcoming games?', 
                'answer' => 'Yes, we offer pre-orders for select upcoming games. You can pre-order them on our website and receive exclusive bonuses.'
            ],
        
            [
                'question' => 'How can I request a refund for a digital purchase?', 
                'answer' => 'If you are not satisfied with a digital purchase, please contact our customer support team within 14 days of purchase to request a refund.'
            ],
        
            [
                'question' => 'Is there a mobile app available for your platform?', 
                'answer' => 'Yes, we have a mobile app that allows you to access your account, purchase games, and stay updated on the latest releases.'
            ],
        
            [
                'question' => 'Can I gift a game to a friend?', 
                'answer' => 'Yes, you can gift games to friends. On the product page, look for the "Gift" option and follow the instructions to send the game as a gift to another user.'
            ]
        ]);
        ProductPurchase::factory(20)->create();
        Notification::factory(20)->create();
    }
}
