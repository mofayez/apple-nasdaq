<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Apple Inc.',
            'symbol' => 'AAPL',
            'description' => "Apple Inc. (formerly Apple Computer, Inc.) is a multinational technology company headquartered in Cupertino, California, in Silicon Valley. It designs, develops, and sells consumer electronics, computer software, and online services. Devices include the iPhone, iPad, Mac, Apple Watch, and Apple TV; operating systems include iOS and macOS; and software applications and services include iTunes, iCloud, and Apple Music.

            As of March 2023, Apple is the world's largest company by market capitalization. In 2022, it was the largest technology company by revenue, with US$394.3 billion. As of June 2022, Apple was the fourth-largest personal computer vendor by unit sales, the largest manufacturing company by revenue, and the second-largest manufacturer of mobile phones in the world. It is one of the Big Five American information technology companies, alongside Alphabet (the parent company of Google), Amazon, Meta (the parent company of Facebook), and Microsoft.
            
            Apple was founded as Apple Computer Company on April 1, 1976, to produce and market Steve Wozniak's Apple I personal computer. The company was incorporated by Wozniak and Steve Jobs in 1977. Its second computer, the Apple II, became a best seller as one of the first mass-produced microcomputers. Apple introduced the Lisa in 1983 and the Macintosh in 1984, as some of the first computers to use a graphical user interface and a mouse. By 1985, the company's internal problems included the high cost of its products and power struggles between executives. That year Jobs left Apple to form NeXT, Inc., and Wozniak withdrew to other ventures. The market for personal computers expanded and evolved throughout the 1990s, and Apple lost considerable market share to the lower-priced duopoly of the Microsoft Windows operating system on Intel-powered PC clones (also known as 'Wintel').
            
            In 1997, Apple was weeks away from bankruptcy. To resolve its failed operating system strategy and entice Jobs's return, it bought NeXT. Over the next decade, Jobs guided Apple back to profitability through several tactics including introducing the iMac, iPod, iPhone, and iPad to critical acclaim, launching the 'Think different' campaign and other memorable advertising campaigns, opening the Apple Store retail chain, and acquiring numerous companies to broaden its product portfolio. Jobs resigned in 2011 for health reasons, and died two months later. He was succeeded as CEO by Tim Cook.
            
            Apple has received criticism regarding its contractors' labor practices, its environmental practices, and its business ethics, including anti-competitive practices and materials sourcing. Nevertheless, it has a large following and a high level of brand loyalty. It has been consistently ranked as one of the world's most valuable brands.
            
            Apple became the first publicly traded U.S. company to be valued at over $1 trillion in August 2018, then at $2 trillion in August 2020, and at $3 trillion in January 2022. In June 2023, it was valued at just over $3 trillion.`,
            'address' => 'Cupertino, California, in Silicon Valley.",
            'logo' => 'apple-logo',
            'industry' => 'Consumer electronics, Software services, Online services'
        ]);
    }
}
