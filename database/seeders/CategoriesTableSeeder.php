<?php

namespace Database\Seeders;

use App\Models\Finer;
use App\Models\MiniMinsubcategory;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Minsubcategory;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Define the categories, subcategories, and minsubcategories
        $categories = [
            'Graphics & Design' => [
                'Logo & Brand Identity' => [
                    'Logo Design' => ['Custom Logos', 'Minimalist Logos', 'Vintage Logos', '3D Logos'],
                    'Brand Style Guides' => ['Color Palettes', 'Typography Guidelines', 'Logo Usage Rules', 'Brand Voice'],
                    'Business Cards & Stationery' => ['Business Card Design', 'Letterheads', 'Envelopes', 'Notepads'],
                    'Fonts & Typography' => ['Custom Fonts', 'Typography Pairing', 'Font Licensing', 'Handwritten Fonts'],
                    'Logo Maker Tool' => ['Online Logo Generators', 'DIY Logo Design', 'Customizable Templates']
                ],
                'Art & Illustration' => [
                    'Illustration' => ['Digital Illustrations', 'Vector Illustrations', 'Concept Art', 'Character Design'],
                    'AI Artists' => ['AI-Generated Art', 'Algorithmic Art', 'Neural Network Art'],
                    'AI Avatar Design' => ['AI-Generated Avatars', 'Custom Avatar Design', 'Animated Avatars'],
                    'Children\'s Book Illustration' => ['Storybook Illustrations', 'Educational Illustrations', 'Character Illustrations'],
                    'Portraits & Caricatures' => ['Digital Portraits', 'Hand-Drawn Caricatures', 'Photo Realistic Portraits'],
                    'Cartoons & Comics' => ['Comic Strips', 'Graphic Novels', 'Cartoon Characters', 'Comic Covers'],
                    'Pattern Design' => ['Seamless Patterns', 'Textile Patterns', 'Background Patterns', 'Custom Prints'],
                    'Tattoo Design' => ['Custom Tattoos', 'Flash Art', 'Tattoo Sleeves', 'Design Consultation'],
                    'Storyboards' => ['Animation Storyboards', 'Film Storyboards', 'Storyboard Templates'],
                    'NFT Art' => ['NFT Artwork Creation', 'Digital Collectibles', 'NFT Minting Guidance']
                ],
                'Web & App Design' => [
                    'Website Design' => ['Responsive Design', 'UI/UX Design', 'Landing Pages', 'E-Commerce Websites'],
                    'App Design' => ['Mobile App Design', 'Tablet App Design', 'UI/UX for Apps', 'App Prototyping'],
                    'UX Design' => ['User Research', 'Wireframing', 'User Testing', 'Interaction Design'],
                    'Landing Page Design' => ['Lead Generation Pages', 'Product Launch Pages', 'Event Registration Pages'],
                    'Icon Design' => ['App Icons', 'Website Icons', 'Custom Icons', 'Icon Sets']
                ],
                'Product & Gaming' => [
                    'Industrial & Product Design' => ['Consumer Products', 'Prototyping', '3D Modeling', 'Product Development'],
                    'Character Modeling' => ['3D Characters', 'Game Characters', 'Animated Characters', 'Character Rigging'],
                    'Game Art' => ['Game Assets', 'Environment Art', 'Character Art', 'Concept Art'],
                    'Graphics for Streamers' => ['Stream Overlays', 'Alert Graphics', 'Custom Emotes', 'Stream Panels']
                ],
                'Print Design' => [
                    'Flyer Design' => ['Event Flyers', 'Promotional Flyers', 'Double-Sided Flyers'],
                    'Brochure Design' => ['Tri-Fold Brochures', 'Bi-Fold Brochures', 'Custom Brochures'],
                    'Poster Design' => ['Movie Posters', 'Event Posters', 'Promotional Posters'],
                    'Catalog Design' => ['Product Catalogs', 'Company Catalogs', 'Interactive Catalogs'],
                    'Menu Design' => ['Restaurant Menus', 'Event Menus', 'Digital Menus']
                ],
                'Visual Design' => [
                    'Image Editing' => ['Retouching', 'Color Correction', 'Background Removal', 'Photo Manipulation'],
                    'Presentation Design' => ['Slide Decks', 'Business Presentations', 'Custom Templates'],
                    'Background Removal' => ['Product Photography', 'Portrait Backgrounds', 'Transparent Backgrounds'],
                    'Infographic Design' => ['Data Visualization', 'Statistical Infographics', 'Educational Infographics'],
                    'Vector Tracing' => ['Logo Vectorization', 'Image Tracing', 'Custom Vector Art'],
                    'Resume Design' => ['Creative Resumes', 'Professional Resumes', 'Resume Templates']
                ],
                'Marketing Design' => [
                    'Social Media Design' => ['Profile Graphics', 'Post Design', 'Stories Design', 'Ad Graphics'],
                    'Social Posts & Banners' => ['Event Banners', 'Promotion Posts', 'Seasonal Graphics'],
                    'Email Design' => ['Newsletter Templates', 'Promotional Emails', 'Email Signatures'],
                    'Web Banners' => ['Display Ads', 'Retargeting Banners', 'Interactive Banners'],
                    'Signage Design' => ['Outdoor Signage', 'Indoor Signage', 'Event Signage']
                ],
                'Packaging & Covers' => [
                    'Packaging & Label Design' => ['Product Labels', 'Packaging Boxes', 'Custom Stickers'],
                    'Book Design' => ['Cover Design', 'Interior Layout', 'Print and E-Book Design'],
                    'Book Covers' => ['Fiction Covers', 'Non-Fiction Covers', 'Custom Illustrations'],
                    'Album Cover Design' => ['Music Album Covers', 'EP Covers', 'Single Artwork']
                ],
                'Architecture & Building Design' => [
                    'Architecture & Interior Design' => ['Residential Design', 'Commercial Design', '3D Renderings'],
                    'Landscape Design' => ['Garden Layouts', 'Outdoor Spaces', 'Hardscape Design'],
                    'Building Engineering' => ['Structural Design', 'Civil Engineering', 'Building Plans']
                ],
                'Fashion & Merchandise' => [
                    'T-Shirts & Merchandise' => ['Custom T-Shirts', 'Hoodies', 'Accessories', 'Print-on-Demand'],
                    'Fashion Design' => ['Clothing Design', 'Textile Patterns', 'Fashion Illustration'],
                    'Jewelry Design' => ['Custom Jewelry', '3D Jewelry Modeling', 'Engagement Rings']
                ],
                '3D Design' => [
                    '3D Architecture' => ['Building Models', 'Interior Visualization', 'Urban Planning'],
                    '3D Industrial Design' => ['Product Prototyping', 'Concept Models', 'Manufacturing Designs'],
                    '3D Fashion & Garment' => ['Virtual Fashion Shows', '3D Clothing Models', 'Fashion Prototypes'],
                    '3D Printing Characters' => ['Custom Figures', 'Action Figures', '3D Models for Printing'],
                    '3D Landscape' => ['Virtual Environments', 'Landscape Modeling', 'Game Worlds'],
                    '3D Game Art' => ['3D Assets', 'Game Environments', 'Character Models'],
                    '3D Jewelry Design' => ['Custom Jewelry Designs', '3D Gem Modeling', 'Jewelry Prototypes']
                ],
                'Miscellaneous' => [
                    'Design Advice' => ['Consultation', 'Design Strategy', 'Creative Direction']
                ]
            ],
            'Programming & Tech' => [
                'Website Development' => [
                    'Business Websites' => ['Corporate Sites', 'Portfolio Websites', 'Service Websites'],
                    'E-Commerce Development' => ['Online Stores', 'Shopping Cart Integration', 'Payment Gateway Setup'],
                    'Landing Pages' => ['Lead Capture Pages', 'Product Launch Pages', 'Sales Pages'],
                    'Dropshipping Websites' => ['Product Listings', 'Supplier Integration', 'Automated Fulfillment'],
                    'Build a Complete Website' => ['Custom Development', 'Domain & Hosting Setup', 'Site Launch']
                ],
                'Website Platforms' => [
                    'WordPress' => ['Theme Development', 'Plugin Integration', 'Custom WordPress Sites'],
                    'Shopify' => ['Store Setup', 'Theme Customization', 'App Integration'],
                    'Wix' => ['Website Building', 'Template Customization', 'SEO Optimization'],
                    'Custom Websites' => ['Bespoke Development', 'Unique Features', 'Tailored Solutions'],
                    'GoDaddy' => ['Website Builder', 'Domain Services', 'Hosting Solutions']
                ],
                'Website Maintenance' => [
                    'Website Customization' => ['Feature Additions', 'Design Changes', 'Functionality Updates'],
                    'Bug Fixes' => ['Error Resolution', 'Performance Improvements', 'Security Patches'],
                    'Backup & Migration' => ['Data Backup', 'Site Migration', 'Database Transfers'],
                    'Speed Optimization' => ['Page Load Speed', 'Caching Solutions', 'Performance Enhancements']
                ],
                'AI Development' => [
                    'AI Chatbot' => ['Customer Service Bots', 'Sales Bots', 'AI-Powered Assistants'],
                    'AI Applications' => ['Custom AI Solutions', 'AI for Data Analysis', 'Machine Learning Models'],
                    'AI Integrations' => ['API Integration', 'Software Integration', 'AI Systems Integration'],
                    'AI Agents' => ['Automated Agents', 'Virtual Assistants', 'Decision-Making Systems'],
                    'AI Fine-Tuning' => ['Model Training', 'Algorithm Optimization', 'Custom AI Models'],
                    'Custom GPT Apps' => ['Custom GPT Models', 'Specialized Applications', 'Personalized AI Solutions']
                ],
                'Chatbot Development' => [
                    'Discord' => ['Bot Creation', 'Community Management', 'Custom Commands'],
                    'Telegram' => ['Bot Development', 'Automated Responses', 'Integration with APIs'],
                    'TikTok' => ['TikTok Chatbots', 'Engagement Bots', 'Interactive Features'],
                    'Facebook Messenger' => ['Messenger Bots', 'Customer Interaction', 'Automated Replies']
                ],
                'Game Development' => [
                    'Gameplay Experience & Feedback' => ['User Testing', 'Feedback Analysis', 'Game Balancing'],
                    'PC Games' => ['Game Design', '3D Modeling', 'Gameplay Mechanics', 'Game Engine Integration'],
                    'Mobile Games' => ['Game Design for Mobile', 'Touch Controls', 'In-App Purchases', 'Cross-Platform Integration']
                ],
                'Mobile App Development' => [
                    'Cross-platform Development' => ['React Native', 'Flutter', 'Xamarin', 'Unified Codebase'],
                    'Android App Development' => ['Native Development', 'Material Design', 'Google Play Integration'],
                    'iOS App Development' => ['Swift Development', 'UI/UX for iOS', 'App Store Integration'],
                    'Website to App' => ['Web to Mobile Conversion', 'Responsive Design Adaptation', 'Hybrid Apps'],
                    'Mobile App Maintenance' => ['Bug Fixes', 'Updates & Upgrades', 'Performance Monitoring'],
                    'VR & AR Development' => ['Virtual Reality Experiences', 'Augmented Reality Applications', 'Interactive Environments']
                ],
                'Cloud & Cybersecurity' => [
                    'Cloud Computing' => ['Cloud Solutions', 'Scalable Infrastructure', 'Cloud Storage Services'],
                    'DevOps Engineering' => ['CI/CD Pipelines', 'Automation', 'Infrastructure as Code'],
                    'Cybersecurity' => ['Threat Assessment', 'Security Audits', 'Penetration Testing', 'Incident Response']
                ],
                'Data Science & ML' => [
                    'Machine Learning' => ['Model Training', 'Algorithm Selection', 'Predictive Analytics'],
                    'Computer Vision' => ['Image Recognition', 'Object Detection', 'Facial Recognition'],
                    'NLP' => ['Natural Language Processing', 'Text Analysis', 'Sentiment Analysis'],
                    'Deep Learning' => ['Neural Networks', 'Deep Neural Networks', 'Training and Optimization']
                ],
                'Software Development' => [
                    'Web Applications' => ['Custom Web Apps', 'SaaS Solutions', 'Interactive Features'],
                    'Desktop Applications' => ['Windows Applications', 'Mac Applications', 'Cross-Platform Apps'],
                    'APIs & Integrations' => ['API Development', 'Third-Party Integrations', 'RESTful Services'],
                    'Databases' => ['Database Design', 'SQL/NoSQL Databases', 'Database Management'],
                    'Scripting' => ['Automation Scripts', 'Data Processing Scripts', 'Custom Scripting Solutions'],
                    'Browser Extensions' => ['Chrome Extensions', 'Firefox Add-ons', 'Custom Extensions'],
                    'QA & Review' => ['Quality Assurance', 'Software Testing', 'Bug Tracking'],
                    'User Testing' => ['Usability Testing', 'A/B Testing', 'User Feedback Collection']
                ],
                'Blockchain & Cryptocurrency' => [
                    'Decentralized Apps (dApps)' => ['Smart Contract Development', 'Decentralized Finance (DeFi)', 'Token Creation'],
                    'Cryptocurrencies & Tokens' => ['Tokenomics', 'Crypto Wallets', 'Token Sales'],
                    'Exchange Platforms' => ['Crypto Exchange Development', 'Trading Systems', 'Security Protocols']
                ],
                'Miscellaneous' => [
                    'Electronics Engineering' => ['Circuit Design', 'Embedded Systems', 'Hardware Prototyping'],
                    'Support & IT' => ['Technical Support', 'IT Consulting', 'Network Setup'],
                    'Convert Files' => ['File Format Conversion', 'Data Migration', 'Document Conversion']
                ]
            ],
            'Digital Marketing' => [
                'Search' => [
                    'Search Engine Optimization (SEO)' => ['On-Page SEO', 'Off-Page SEO', 'Technical SEO', 'Keyword Research'],
                    'Search Engine Marketing (SEM)' => ['Google Ads', 'Bing Ads', 'Pay-Per-Click (PPC)', 'Ad Copywriting'],
                    'Local SEO' => ['Google My Business Optimization', 'Local Citations', 'Local Reviews', 'Map Pack Optimization'],
                    'E-Commerce SEO' => ['Product Page Optimization', 'Category Pages', 'SEO for Online Stores', 'Site Structure Optimization'],
                    'Video SEO' => ['YouTube Optimization', 'Video Tags & Descriptions', 'Video Thumbnails', 'Video Engagement Metrics']
                ],
                'Social' => [
                    'Social Media Marketing' => ['Strategy Development', 'Content Creation', 'Social Media Ads', 'Profile Management'],
                    'Paid Social Media' => ['Ad Campaign Management', 'Targeting & Retargeting', 'Performance Analysis', 'Budget Management'],
                    'Social Commerce' => ['Shoppable Posts', 'Social Media Sales Funnels', 'E-Commerce Integration', 'Social Product Launches'],
                    'Influencer Marketing' => ['Influencer Outreach', 'Campaign Management', 'Performance Tracking', 'Partnership Development'],
                    'Community Management' => ['Engagement Strategies', 'Moderation', 'Community Building', 'User Interaction']
                ],
                'Methods & Techniques' => [
                    'Video Marketing' => ['Video Content Creation', 'Video Strategy', 'Video Distribution', 'Video Performance Tracking'],
                    'E-Commerce Marketing' => ['Product Listings Optimization', 'Sales Funnels', 'Promotions & Discounts', 'Customer Retargeting'],
                    'Email Marketing' => ['Campaign Design', 'List Segmentation', 'Personalization', 'Performance Metrics'],
                    'Email Automations' => ['Autoresponders', 'Drip Campaigns', 'Trigger-Based Emails', 'Lifecycle Emails'],
                    'Guest Posting' => ['Content Placement', 'Guest Writer Outreach', 'SEO Benefits', 'Content Strategy'],
                    'Affiliate Marketing' => ['Affiliate Program Setup', 'Affiliate Recruitment', 'Commission Tracking', 'Performance Analytics'],
                    'Display Advertising' => ['Banner Ads', 'Retargeting Ads', 'Programmatic Advertising', 'Display Ad Design'],
                    'Public Relations' => ['Press Releases', 'Media Outreach', 'Crisis Management', 'Reputation Management'],
                    'Text Message Marketing' => ['SMS Campaigns', 'Customer Engagement', 'Message Personalization', 'Compliance & Opt-Out Management']
                ],
                'Analytics & Strategy' => [
                    'Marketing Strategy' => ['Campaign Planning', 'Market Research', 'Competitive Analysis', 'Budget Allocation'],
                    'Marketing Concepts & Ideation' => ['Creative Brainstorming', 'Concept Development', 'Market Testing', 'Idea Validation'],
                    'Marketing Advice' => ['Expert Consultation', 'Strategy Recommendations', 'Tactical Planning', 'Optimization Strategies'],
                    'Web Analytics' => ['Google Analytics', 'Traffic Analysis', 'Conversion Tracking', 'User Behavior Insights'],
                    'Conversion Rate Optimization (CRO)' => ['A/B Testing', 'Landing Page Optimization', 'Conversion Funnels', 'Heatmaps']
                ],
                'Channel Specific' => [
                    'TikTok Shop' => ['Shop Setup', 'Product Listings', 'TikTok Ads Integration', 'Content Strategy'],
                    'Facebook Ads Campaign' => ['Ad Creation', 'Target Audience Setup', 'Campaign Management', 'Performance Analysis'],
                    'Instagram Marketing' => ['Profile Optimization', 'Content Creation', 'Instagram Ads', 'Influencer Collaborations'],
                    'Google SEM' => ['Search Ads', 'Display Ads', 'Google Shopping Ads', 'Ad Performance Tracking'],
                    'Shopify Marketing' => ['Shopify SEO', 'Shopify Ads', 'Product Page Optimization', 'Shopify Email Campaigns']
                ],
                'Industry & Purpose-Specific' => [
                    'Music Promotion' => ['Social Media Promotion', 'Streaming Service Optimization', 'Music Video Promotion', 'Concert Advertising'],
                    'Podcast Marketing' => ['Episode Promotion', 'Podcast SEO', 'Listener Engagement', 'Sponsorship & Partnerships'],
                    'Book & eBook Marketing' => ['Book Launch Campaigns', 'Author Branding', 'eBook Promotion', 'Reader Engagement'],
                    'Mobile App Marketing' => ['App Store Optimization (ASO)', 'In-App Advertising', 'User Acquisition', 'App Retention Strategies']
                ],
                'Miscellaneous' => [
                    'Crowdfunding' => ['Campaign Creation', 'Fundraising Strategy', 'Backer Engagement', 'Rewards Management'],
                    'Other' => ['Innovative Marketing Strategies', 'Custom Solutions', 'Consulting Services']
                ]
            ],
            'Video & Animation' => [
                'Editing & Post-Production' => [
                    'Video Editing' => ['Cutting & Trimming', 'Color Correction', 'Audio Editing', 'Final Assembly'],
                    'Visual Effects' => ['Special Effects', 'Compositing', 'Motion Graphics Integration', 'CGI Effects'],
                    'Video Art' => ['Creative Visuals', 'Artistic Editing', 'Experimental Techniques', 'Visual Storytelling'],
                    'Intro & Outro Videos' => ['Brand Intros', 'Video End Screens', 'Custom Animation', 'Logo Reveals'],
                    'Video Templates Editing' => ['Template Customization', 'Pre-Designed Elements', 'Editable Templates'],
                    'Subtitles & Captions' => ['Multilingual Subtitles', 'Closed Captions', 'Subtitle Synchronization', 'Accessibility Features'],
                    'Find a Long-Term Video Editor' => ['Freelance Editors', 'Video Editing Agencies', 'Ongoing Editing Contracts']
                ],
                'Social & Marketing Videos' => [
                    'Video Ads & Commercials' => ['Ad Creation', 'Scriptwriting', 'Targeted Advertising', 'Performance Metrics'],
                    'Social Media Videos' => ['Content Creation', 'Platform Optimization', 'Engagement Strategies', 'Video Ads'],
                    'UGC Videos' => ['User-Generated Content', 'Content Curation', 'Community Videos', 'Campaign Integration'],
                    'Music Videos' => ['Concept Development', 'Shooting & Editing', 'Artist Collaboration', 'Promotion'],
                    'Slideshow Videos' => ['Photo Slideshows', 'Event Recaps', 'Product Slideshows', 'Animated Slideshows']
                ],
                'Animation' => [
                    'Character Animation' => ['2D Character Animation', '3D Character Animation', 'Character Design', 'Rigging'],
                    'Animated GIFs' => ['Custom GIFs', 'Social Media GIFs', 'Marketing GIFs', 'Looping Animations'],
                    'Animation for Kids' => ['Educational Animation', 'Entertainment Content', 'Animated Stories', 'Character Development'],
                    'Animation for Streamers' => ['Stream Overlays', 'Alerts & Transitions', 'Custom Emotes', 'Animated Alerts'],
                    'Rigging' => ['Character Rigging', 'Object Rigging', 'Animation Rigging', 'Bone Systems'],
                    'NFT Animation' => ['Animated NFT Art', 'Digital Collectibles', 'Crypto Art Animation', 'Blockchain Integration']
                ],
                'Motion Graphics' => [
                    'Logo Animation' => ['Animated Logos', 'Brand Intros', 'Logo Reveals', 'Motion Branding'],
                    'Lottie & Web Animation' => ['Lottie Files', 'Interactive Animations', 'Web-Based Animations', 'Custom Lottie Designs'],
                    'Text Animation' => ['Text Effects', 'Animated Typography', 'Title Sequences', 'Kinetic Typography']
                ],
                'Filmed Video Production' => [
                    'Videographers' => ['Event Videography', 'Corporate Videography', 'Commercial Videography', 'Documentary Production'],
                    'Filmed Video Production' => ['Full-Service Production', 'Script to Screen', 'Shooting & Editing', 'Project Management']
                ],
                'Explainer Videos' => [
                    'Animated Explainers' => ['2D Animation', '3D Animation', 'Scripted Explainers', 'Storyboard Creation'],
                    'Live Action Explainers' => ['On-Screen Talent', 'Location Shoots', 'Live Action & Animation Mix', 'Professional Narration'],
                    'Spokesperson Videos' => ['Corporate Spokespersons', 'Product Demonstrations', 'Professional Presentations'],
                    'Screencasting Videos' => ['Software Tutorials', 'Product Demonstrations', 'Screen Recordings', 'Tech Tutorials'],
                    'eLearning Video Production' => ['Educational Videos', 'Training Modules', 'Interactive Lessons', 'Course Content Creation'],
                    'Crowdfunding Videos' => ['Campaign Videos', 'Investor Pitches', 'Project Highlights', 'Call-to-Action']
                ],
                'Product Videos' => [
                    '3D Product Animation' => ['Detailed 3D Models', 'Product Features', 'Interactive Demonstrations', 'Marketing Visuals'],
                    'E-Commerce Product Videos' => ['Product Demonstrations', 'Unboxing Videos', 'Feature Highlights', 'Customer Reviews'],
                    'Corporate Videos' => ['Company Overviews', 'Brand Stories', 'Corporate Messaging', 'Employee Testimonials'],
                    'App & Website Previews' => ['App Demos', 'Website Walkthroughs', 'Feature Highlights', 'User Experience Showcases']
                ],
                'AI Video' => [
                    'AI Video Art' => ['Generative Art', 'AI-Enhanced Visuals', 'Creative AI Outputs'],
                    'AI Music Videos' => ['AI-Generated Music Videos', 'Algorithmic Video Creation', 'Music and AI Integration'],
                    'AI Spokespersons Videos' => ['Virtual Spokespersons', 'AI-Generated Presentations', 'Synthetic Hosts']
                ],
                'Miscellaneous' => [
                    'Article to Video' => ['Content Adaptation', 'Video Summaries', 'Editorial to Video Conversion'],
                    'Game Trailers' => ['Gameplay Highlights', 'Promotional Trailers', 'Feature Showcases'],
                    'Game Recordings & Guides' => ['Gameplay Videos', 'Walkthroughs', 'Strategy Guides'],
                    'Meditation Videos' => ['Guided Meditations', 'Relaxation Videos', 'Mindfulness Practices'],
                    'Real Estate Promos' => ['Property Tours', 'Agent Profiles', 'Market Overviews'],
                    'Book Trailers' => ['Book Previews', 'Author Introductions', 'Promotional Content'],
                    'Video Advice' => ['Editing Tips', 'Production Advice', 'Content Strategy'],
                    'Other' => ['Unique Video Projects', 'Custom Requests', 'Specialized Production']
                ],
                'Photography' => [
                    'Product Photographers' => ['E-Commerce Photography', 'Product Catalogs', 'Lifestyle Product Shots'],
                    'Portrait Photographers' => ['Personal Portraits', 'Corporate Headshots', 'Family Photos'],
                    'Lifestyle & Fashion Photographers' => ['Fashion Shoots', 'Lifestyle Imagery', 'Editorial Photography'],
                    'Local Photographers' => ['Regional Photography Services', 'Local Event Coverage', 'Community Projects']
                ]
            ],
            'Writing & Translation' => [
                'Content Writing' => [
                    'Articles & Blog Posts' => ['SEO Articles', 'Guest Posts', 'Industry Blogs', 'Long-Form Content'],
                    'Content Strategy' => ['Content Planning', 'Editorial Calendar', 'Content Audits', 'Strategy Development'],
                    'Website Content' => ['Homepage Copy', 'Service Pages', 'About Us', 'Landing Pages'],
                    'Scriptwriting' => ['Video Scripts', 'Film Scripts', 'Podcast Scripts', 'Advertising Scripts'],
                    'Creative Writing' => ['Short Stories', 'Novels', 'Poetry', 'Creative Projects'],
                    'Podcast Writing' => ['Episode Scripts', 'Show Notes', 'Podcast Outlines', 'Guest Questions'],
                    'Speechwriting' => ['Public Speeches', 'Corporate Speeches', 'Keynote Addresses', 'Event Presentations'],
                    'Research & Summaries' => ['Research Papers', 'Executive Summaries', 'Market Research', 'White Papers'],
                    'Find an Expert Writer' => ['Freelance Writers', 'Specialized Writing Services', 'Content Agencies']
                ],
                'Editing & Critique' => [
                    'Proofreading & Editing' => ['Grammar & Spelling Checks', 'Punctuation Corrections', 'Formatting', 'Content Refinement'],
                    'AI Content Editing' => ['AI-Enhanced Proofreading', 'AI Writing Assistance', 'Content Optimization', 'Algorithmic Editing'],
                    'Writing Advice' => ['Writing Tips', 'Style Guides', 'Content Improvement', 'Feedback & Guidance']
                ],
                'Book & eBook Publishing' => [
                    'Book & eBook Writing' => ['Manuscript Development', 'Plot Structuring', 'Character Development', 'Dialogue Writing'],
                    'Book Editing' => ['Developmental Editing', 'Line Editing', 'Copy Editing', 'Proofreading'],
                    'Beta Reading' => ['Beta Reader Recruitment', 'Feedback Collection', 'Revision Suggestions'],
                    'Self-Publish Your Book' => ['Self-Publishing Platforms', 'Cover Design', 'Formatting', 'Marketing Strategies']
                ],
                'Career Writing' => [
                    'Resume Writing' => ['Professional Resumes', 'Tailored Resumes', 'Industry-Specific Resumes', 'Resume Reviews'],
                    'Cover Letters' => ['Personalized Cover Letters', 'Cover Letter Templates', 'Targeted Applications'],
                    'LinkedIn Profiles' => ['Profile Optimization', 'Headline & Summary Writing', 'Skills & Endorsements'],
                    'Job Descriptions' => ['Job Posting Creation', 'Role Specifications', 'Skill Requirements', 'Company Branding']
                ],
                'Miscellaneous' => [
                    'eLearning Content Development' => ['Course Creation', 'Learning Materials', 'Educational Resources', 'Interactive Content'],
                    'Technical Writing' => ['User Manuals', 'API Documentation', 'Technical Guides', 'Instructional Content']
                ],
                'Business & Marketing Copy' => [
                    'Brand Voice & Tone' => ['Brand Messaging', 'Voice Guidelines', 'Tone of Voice', 'Style Consistency'],
                    'Business Names & Slogans' => ['Naming Services', 'Catchy Slogans', 'Tagline Creation', 'Brand Identity'],
                    'Case Studies' => ['Customer Success Stories', 'Problem-Solution Analysis', 'Impact Reports'],
                    'White Papers' => ['Industry Insights', 'Research Reports', 'Technical Papers', 'Thought Leadership'],
                    'Product Descriptions' => ['E-Commerce Listings', 'Feature Descriptions', 'Benefits & Use Cases'],
                    'Ad Copy' => ['Sales Ads', 'PPC Ad Copy', 'Social Media Ads', 'Print Ads'],
                    'Sales Copy' => ['Landing Page Copy', 'Sales Letters', 'Product Offers', 'Call-to-Action'],
                    'Email Copy' => ['Marketing Emails', 'Newsletters', 'Drip Campaigns', 'Transactional Emails'],
                    'Social Media Copywriting' => ['Post Copy', 'Social Media Ads', 'Engagement Content', 'Brand Voice'],
                    'Press Releases' => ['Media Announcements', 'News Releases', 'Event Announcements', 'Company Updates'],
                    'UX Writing' => ['User Interface Text', 'Microcopy', 'Onboarding Messages', 'Error Messages']
                ],
                'Translation & Transcription' => [
                    'Translation' => ['Document Translation', 'Website Translation', 'Literary Translation', 'Technical Translation'],
                    'Localization' => ['Cultural Adaptation', 'Regional Customization', 'Localized Marketing Content', 'Multilingual Support'],
                    'Transcription' => ['Audio Transcription', 'Video Transcription', 'Meeting Minutes', 'Legal Transcription'],
                    'Interpretation' => ['Simultaneous Interpretation', 'Consecutive Interpretation', 'Phone & Video Interpretation', 'Conference Interpretation']
                ],
                'Industry Specific Content' => [
                    'Business, Finance & Law' => ['Financial Reports', 'Business Analysis', 'Legal Documentation', 'Corporate Communications'],
                    'Health & Medical' => ['Medical Writing', 'Health Guides', 'Patient Education Materials', 'Healthcare Content'],
                    'Internet & Technology' => ['Tech Reviews', 'Product Documentation', 'Software Guides', 'IT Articles'],
                    'News & Politics' => ['News Articles', 'Political Analysis', 'Opinion Pieces', 'Editorial Content'],
                    'Marketing' => ['Marketing Research', 'Advertising Copy', 'Market Trends', 'Campaign Strategies'],
                    'Real Estate' => ['Property Listings', 'Market Reports', 'Real Estate Guides', 'Agent Profiles']
                ]
            ],
            'Music & Audio' => [
                'Music Production & Writing' => [
                    'Music Producers' => ['Beat Making', 'Studio Recording', 'Music Arrangement', 'Production Services'],
                    'Composers' => ['Custom Compositions', 'Film Scores', 'Background Music', 'Song Arrangement'],
                    'Singers & Vocalists' => ['Lead Vocals', 'Backing Vocals', 'Session Singing', 'Vocal Arrangement'],
                    'Session Musicians' => ['Instrumental Tracks', 'Live Performance', 'Collaborative Projects', 'Musical Arrangement'],
                    'Songwriters' => ['Lyrics Writing', 'Melody Creation', 'Song Structure', 'Collaborative Songwriting'],
                    'Jingles & Intros' => ['Custom Jingles', 'Brand Intros', 'Podcast Intros', 'Commercial Jingles'],
                    'Custom Songs' => ['Personalized Songs', 'Custom Lyrics', 'Special Occasions', 'Unique Compositions']
                ],
                'Audio Engineering & Post Production' => [
                    'Mixing & Mastering' => ['Audio Balancing', 'Sound Enhancement', 'Final Mix', 'Mastering Services'],
                    'Audio Editing' => ['Track Editing', 'Noise Reduction', 'Audio Restoration', 'Editing Services'],
                    'Vocal Tuning' => ['Pitch Correction', 'Vocal Enhancement', 'Autotune Services', 'Vocal Processing']
                ],
                'Voice Over & Narration' => [
                    'Voice Over' => ['Professional Voice Overs', 'Narration Services', 'Character Voices', 'Commercial Voice Overs'],
                    'Female Voice Over' => ['Voice Acting', 'Narration', 'Character Voices', 'Commercial Work'],
                    'Male Voice Over' => ['Voice Acting', 'Narration', 'Character Voices', 'Commercial Work'],
                    'French Voice Over' => ['French Narration', 'French Voice Acting', 'French Commercials', 'French Audiobooks'],
                    'German Voice Over' => ['German Narration', 'German Voice Acting', 'German Commercials', 'German Audiobooks'],
                    '24hr Turnaround' => ['Fast Delivery', 'Quick Turnaround', 'Expedited Services']
                ],
                'Streaming & Audio' => [
                    'Podcast Production' => ['Recording & Editing', 'Show Planning', 'Podcast Distribution', 'Marketing'],
                    'Audiobook Production' => ['Recording', 'Narration', 'Editing', 'Distribution'],
                    'Audio Ads Production' => ['Commercial Audio Ads', 'Scriptwriting', 'Voice Overs', 'Sound Design'],
                    'Voice Synthesis & AI' => ['AI-Generated Voices', 'Voice Cloning', 'Synthetic Speech', 'Voice Modulation']
                ],
                'DJing' => [
                    'DJ Drops & Tags' => ['Custom DJ Drops', 'DJ Tags', 'Event Announcements', 'Branding'],
                    'DJ Mixing' => ['Live Mixing', 'Remixes', 'Set Preparation', 'Event DJing'],
                    'Remixing' => ['Track Remixes', 'Custom Remixes', 'Mashups', 'Dance Remixes']
                ],
                'Sound Design' => [
                    'Sound Design' => ['Custom Sound Effects', 'Audio Branding', 'Sonic Identity', 'Creative Soundscapes'],
                    'Meditation Music' => ['Relaxing Music', 'Guided Meditations', 'Ambient Sounds', 'Wellness Tracks'],
                    'Audio Logo & Sonic Branding' => ['Brand Sound Identity', 'Audio Logos', 'Sonic Branding', 'Custom Sound Signatures'],
                    'Custom Patches & Samples' => ['Sound Libraries', 'Custom Audio Patches', 'Sample Packs', 'Instrument Sounds'],
                    'Audio Plugin Development' => ['Custom Plugins', 'Audio Effects', 'Virtual Instruments', 'Plugin Development']
                ],
                'Lessons & Transcriptions' => [
                    'Online Music Lessons' => ['Instrument Lessons', 'Vocal Training', 'Music Theory', 'Private Lessons'],
                    'Music Transcription' => ['Sheet Music', 'Chord Progressions', 'Tablature', 'Transcription Services'],
                    'Music & Audio Advice' => ['Expert Consultations', 'Production Tips', 'Audio Equipment Recommendations', 'Music Career Guidance']
                ]
            ],
            'Business' => [
                'Financial Services' => [
                    'Accounting & Bookkeeping' => ['Financial Statements', 'Tax Preparation', 'Bookkeeping Services', 'Account Reconciliation'],
                    'Tax Consulting' => ['Tax Planning', 'Tax Filing Assistance', 'Tax Compliance', 'Tax Strategy'],
                    'Financial Forecasting & Modeling' => ['Budget Forecasting', 'Financial Projections', 'Financial Models', 'Scenario Analysis'],
                    'Analysis, Valuation & Optimization' => ['Business Valuation', 'Financial Analysis', 'Performance Optimization', 'Cost Analysis'],
                    'Personal Finance & Wealth Management' => ['Investment Planning', 'Retirement Planning', 'Wealth Management', 'Personal Budgeting'],
                    'Legal Services' => ['Legal Consultation', 'Contract Drafting', 'Dispute Resolution', 'Compliance'],
                    'Applications & Registrations' => ['Business Licensing', 'Trademark Registration', 'Patent Applications', 'Business Permits'],
                    'Legal Documents & Contracts' => ['Contract Drafting', 'Legal Agreements', 'Non-Disclosure Agreements', 'Service Contracts'],
                    'Legal Review' => ['Document Review', 'Contract Review', 'Compliance Check', 'Legal Risk Assessment'],
                    'Legal Research' => ['Case Law Research', 'Regulatory Research', 'Legal Precedents', 'Jurisprudence Analysis']
                ],
                'Business Management' => [
                    'Business Registration' => ['Company Formation', 'Legal Structure', 'Entity Registration', 'Trademark Registration'],
                    'Business Plans' => ['Business Plan Writing', 'Market Analysis', 'Financial Planning', 'Strategic Planning'],
                    'Business Consulting' => ['Operational Consulting', 'Strategic Consulting', 'Management Consulting', 'Growth Strategies'],
                    'Sustainability Consulting' => ['Sustainable Practices', 'Environmental Impact Assessment', 'Corporate Social Responsibility', 'Sustainability Reporting'],
                    'HR Consulting' => ['Recruitment Services', 'HR Policies & Procedures', 'Employee Training', 'Compensation Planning'],
                    'Market Research' => ['Market Analysis', 'Consumer Insights', 'Competitor Analysis', 'Industry Reports'],
                    'Presentations' => ['Business Presentations', 'Pitch Decks', 'Investor Presentations', 'Conference Presentations'],
                    'Supply Chain Management' => ['Logistics Optimization', 'Supplier Management', 'Inventory Control', 'Supply Chain Analysis'],
                    'Project Management' => ['Project Planning', 'Resource Allocation', 'Project Tracking', 'Risk Management']
                ],
                'AI for Businesses' => [
                    'AI Strategy' => ['AI Roadmaps', 'Implementation Plans', 'AI Use Cases', 'Strategic AI Integration'],
                    'AI Lessons' => ['AI Training', 'Workshops', 'Educational Resources', 'AI Literacy'],
                    'E-Commerce Management' => ['AI for E-Commerce', 'Automated Customer Service', 'Personalized Recommendations', 'Inventory Management'],
                    'Product Research' => ['AI-Driven Market Research', 'Product Development Insights', 'Consumer Behavior Analysis', 'Trend Forecasting'],
                    'Store Management' => ['AI for Store Operations', 'Sales Forecasting', 'Customer Insights', 'Operational Efficiency'],
                    'Amazon Experts' => ['Amazon Store Optimization', 'Product Listings', 'Advertising Strategies', 'Sales Growth'],
                    'Shopify Experts' => ['Shopify Store Setup', 'Theme Customization', 'App Integration', 'Sales Strategies'],
                    'Etsy Experts' => ['Etsy Shop Setup', 'Product Listings Optimization', 'Marketing Strategies', 'Sales Growth']
                ],
                'Data & Business Intelligence' => [
                    'Data Visualization' => ['Interactive Dashboards', 'Data Charts', 'Graphs & Infographics', 'Custom Visualizations'],
                    'Data Analytics' => ['Descriptive Analytics', 'Predictive Analytics', 'Diagnostic Analytics', 'Advanced Analytics'],
                    'Data Processing' => ['Data Cleaning', 'Data Transformation', 'Data Aggregation', 'Data Integration'],
                    'Data Entry' => ['Manual Data Entry', 'Automated Data Entry', 'Data Migration', 'Database Updates'],
                    'Data Scraping' => ['Web Scraping', 'Data Extraction', 'API Data Extraction', 'Data Aggregation'],
                    'Data Cleaning' => ['Error Correction', 'Data Validation', 'Data Formatting', 'Duplicate Removal']
                ],
                'Sales & Customer Care' => [
                    'Sales' => ['Lead Generation', 'Sales Strategy', 'Sales Funnel Optimization', 'Customer Acquisition'],
                    'Lead Generation' => ['Lead Qualification', 'Prospecting', 'Lead Nurturing', 'Sales Campaigns'],
                    'Call Center & Calling' => ['Outbound Calling', 'Inbound Call Handling', 'Call Scripts', 'Customer Service'],
                    'Customer Care' => ['Customer Support', 'Customer Retention', 'Service Recovery', 'Feedback Management']
                ],
                'General & Administrative' => [
                    'Virtual Assistant' => ['Administrative Support', 'Scheduling & Calendar Management', 'Email Management', 'Data Entry'],
                    'Online Investigations' => ['Background Checks', 'Market Research', 'Competitive Analysis', 'Online Research'],
                    'Fact Checking' => ['Verification Services', 'Research Accuracy', 'Data Validation', 'Content Fact-Checking']
                ],
                'Miscellaneous' => [
                    'Software Management' => ['Software Implementation', 'Licensing Management', 'Software Upgrades', 'IT Support'],
                    'Product Management' => ['Product Development', 'Market Analysis', 'Product Lifecycle Management', 'Roadmap Planning'],
                    'Event Management' => ['Event Planning', 'Venue Selection', 'Logistics Coordination', 'Event Promotion']
                ]
            ],
            'Consulting' => [
                'Business Consultants' => [
                    'Legal Consulting' => ['Regulatory Compliance', 'Legal Strategy', 'Contract Negotiation', 'Legal Risk Management'],
                    'Financial Consulting' => ['Financial Planning', 'Investment Strategy', 'Tax Optimization', 'Financial Risk Management'],
                    'Business Consulting' => ['Operational Efficiency', 'Growth Strategies', 'Market Positioning', 'Strategic Planning'],
                    'HR Consulting' => ['Employee Relations', 'Organizational Development', 'Talent Acquisition', 'Performance Management'],
                    'AI Consulting' => ['AI Implementation', 'Machine Learning Models', 'AI Strategy', 'AI Integration'],
                    'Business Plans' => ['Business Model Development', 'Market Research', 'Financial Projections', 'Strategic Objectives'],
                    'E-commerce Consulting' => ['E-commerce Strategy', 'Online Store Optimization', 'Digital Marketing', 'Sales Growth']
                ],
                'Marketing Strategy' => [
                    'Marketing Strategy' => ['Strategic Planning', 'Market Positioning', 'Campaign Management', 'Brand Development'],
                    'Content Strategy' => ['Content Planning', 'Editorial Calendars', 'Content Creation', 'Content Distribution'],
                    'Social Media Strategy' => ['Social Media Planning', 'Engagement Strategies', 'Content Scheduling', 'Social Analytics'],
                    'Influencers Strategy' => ['Influencer Partnerships', 'Campaign Management', 'Influencer Outreach', 'Performance Metrics'],
                    'Video Marketing Consulting' => ['Video Content Strategy', 'Video Production', 'YouTube Optimization', 'Video Analytics'],
                    'SEM Strategy' => ['Search Engine Marketing', 'Paid Search Campaigns', 'Keyword Research', 'Ad Performance Optimization'],
                    'PR Strategy' => ['Public Relations Planning', 'Media Outreach', 'Press Release Distribution', 'Reputation Management']
                ],
                'Data Consulting' => [
                    'Data Analytics Consulting' => ['Data Analysis', 'Predictive Analytics', 'Data Interpretation', 'Reporting'],
                    'Databases Consulting' => ['Database Design', 'Database Management', 'Data Security', 'Database Optimization'],
                    'Data Visualization Consulting' => ['Data Visualization Techniques', 'Dashboard Design', 'Interactive Reports', 'Custom Visualizations']
                ],
                'Coaching & Advice' => [
                    'Career Counseling' => ['Career Development', 'Job Search Strategies', 'Resume Writing', 'Interview Preparation'],
                    'Life Coaching' => ['Personal Development', 'Goal Setting', 'Motivational Coaching', 'Life Planning'],
                    'Game Coaching' => ['Game Strategy', 'Performance Improvement', 'Skill Development', 'Competitive Coaching'],
                    'Styling & Beauty Advice' => ['Personal Styling', 'Beauty Tips', 'Wardrobe Planning', 'Image Consulting'],
                    'Travel Advice' => ['Travel Planning', 'Destination Recommendations', 'Travel Safety', 'Travel Itineraries'],
                    'Nutrition Coaching' => ['Diet Planning', 'Nutritional Advice', 'Healthy Eating', 'Personalized Nutrition Plans'],
                    'Mindfulness Coaching' => ['Mindfulness Practices', 'Stress Management', 'Meditation Techniques', 'Mindfulness Training']
                ],
                'Tech Consulting' => [
                    'Website Consulting' => ['Website Design', 'User Experience', 'SEO Optimization', 'Website Maintenance'],
                    'Mobile App Consulting' => ['App Development Strategy', 'User Experience Design', 'App Monetization', 'Market Research'],
                    'Game Development Consulting' => ['Game Design', 'Development Strategy', 'User Engagement', 'Game Marketing'],
                    'Software Development Consulting' => ['Software Design', 'Development Methodologies', 'Project Management', 'Software Testing'],
                    'Cybersecurity Consulting' => ['Security Audits', 'Risk Assessment', 'Threat Management', 'Compliance']
                ],
                'Mentorship' => [
                    'Marketing Mentorship' => ['Marketing Strategy', 'Campaign Management', 'Digital Marketing', 'Brand Building'],
                    'Design Mentorship' => ['Design Principles', 'Portfolio Development', 'Creative Techniques', 'Design Critique'],
                    'Writing Mentorship' => ['Writing Skills Development', 'Content Creation', 'Editing & Proofreading', 'Publishing Guidance'],
                    'Video Mentorship' => ['Video Production', 'Editing Techniques', 'Content Strategy', 'YouTube Growth'],
                    'Music Mentorship' => ['Music Production', 'Songwriting', 'Performance Techniques', 'Music Industry Insights']
                ]
            ],
            'AI Services' => [
                'AI Development' => [
                    'AI Applications' => ['Custom AI Solutions', 'AI Integration', 'AI for Business', 'AI in Healthcare'],
                    'AI Integrations' => ['System Integration', 'API Integration', 'AI-Enhanced Systems', 'Platform Integrations'],
                    'AI Chatbot' => ['Chatbot Development', 'Conversational AI', 'Chatbot Optimization', 'Customer Interaction'],
                    'AI Agents' => ['Intelligent Agents', 'Virtual Assistants', 'Automation Agents', 'AI-Driven Support'],
                    'AI Fine-Tuning' => ['Model Fine-Tuning', 'Performance Optimization', 'AI Customization', 'Algorithm Adjustment'],
                    'Custom GPT Apps' => ['GPT Application Development', 'Custom AI Models', 'Text Generation Applications', 'Chatbot Solutions']
                ],
                'Data' => [
                    'Data Science & ML' => ['Machine Learning', 'Deep Learning', 'Predictive Modeling', 'Data Science Consulting'],
                    'Data Analytics' => ['Data Analysis', 'Predictive Analytics', 'Data Reporting', 'Business Intelligence'],
                    'Data Visualization' => ['Dashboard Creation', 'Graphical Reports', 'Interactive Charts', 'Data Storytelling']
                ],
                'AI Artists' => [
                    'Midjourney Artists' => ['Artwork Creation', 'Custom Art', 'AI-Generated Illustrations', 'Midjourney Expertise'],
                    'DALL-E Artists' => ['DALL-E Art Generation', 'Custom Imagery', 'AI Art Solutions', 'DALL-E Expertise'],
                    'Stable Diffusion Artists' => ['Artwork Generation', 'Creative Visuals', 'Custom Illustrations', 'Stable Diffusion Expertise'],
                    'All AI Art Services' => ['AI Art Creation', 'Art Style Transfer', 'AI Illustration', 'Custom Art Solutions']
                ],
                'AI for Businesses' => [
                    'AI Consulting' => ['AI Strategy', 'Implementation Guidance', 'Business AI Solutions', 'Consultation Services'],
                    'AI Strategy' => ['Strategic Planning', 'Business Integration', 'AI Roadmaps', 'Technology Adoption'],
                    'AI Lessons' => ['Educational Workshops', 'AI Training Programs', 'Custom AI Lessons', 'Business AI Training']
                ],
                'AI Video' => [
                    'AI Video Art' => ['AI-Generated Video Content', 'Custom Video Art', 'Creative Video Solutions', 'AI Art Integration'],
                    'AI Music Videos' => ['AI-Generated Music Videos', 'Custom Music Visuals', 'AI Video Solutions', 'Creative Music Projects'],
                    'AI Spokespersons Videos' => ['AI-Generated Spokespersons', 'Custom Video Presentations', 'AI Personality Videos', 'AI-Driven Content']
                ],
                'AI Audio' => [
                    'Voice Synthesis & AI' => ['AI Voice Generation', 'Synthetic Voices', 'Custom Voice Solutions', 'Voice Modeling'],
                    'Text to Speech' => ['Text-to-Speech Services', 'Custom TTS Solutions', 'Voice Generation', 'Speech Synthesis']
                ],
                'AI Content' => [
                    'AI Content Editing' => ['AI-Powered Editing Tools', 'Content Optimization', 'AI-Assisted Proofreading', 'Editing Services'],
                    'Custom Writing Prompts' => ['AI-Generated Prompts', 'Custom Writing Ideas', 'Creative Writing Prompts', 'Content Inspiration']
                ]
            ],
            'Self Improvement' => [
                'Online Tutoring' => [
                    'Language Lessons' => ['English', 'Spanish', 'French', 'Mandarin'],
                    'Life Coaching' => ['Personal Development', 'Goal Setting', 'Motivation', 'Career Advice'],
                    'Career Counseling' => ['Resume Building', 'Job Search Strategies', 'Interview Preparation', 'Career Planning'],
                    'Generative AI Lessons' => ['AI Basics', 'Generative Models', 'Hands-On AI Projects', 'Advanced AI Techniques']
                ],
                'Fashion & Style' => [
                    'Modeling & Acting' => ['Model Coaching', 'Acting Workshops', 'Portfolio Development', 'Casting Advice'],
                    'Styling & Beauty' => ['Personal Styling', 'Makeup Tutorials', 'Fashion Advice', 'Beauty Consulting'],
                    'Trend Forecasting' => ['Fashion Trends', 'Market Analysis', 'Trend Predictions', 'Consumer Insights']
                ],
                'Wellness & Fitness' => [
                    'Fitness' => ['Personal Training', 'Workout Plans', 'Fitness Coaching', 'Exercise Routines'],
                    'Nutrition' => ['Diet Planning', 'Healthy Eating', 'Nutritional Counseling', 'Meal Prep Advice'],
                    'Wellness' => ['Mental Health', 'Stress Management', 'Wellness Coaching', 'Holistic Health'],
                    'Gaming' => ['Game Coaching', 'eSports Strategy', 'Game Improvement', 'Gameplay Analysis'],
                    'Game Coaching' => ['Individual Coaching', 'Team Coaching', 'Strategy Sessions', 'Performance Analysis'],
                    'eSports Management & Strategy' => ['eSports Team Management', 'Event Planning', 'Competitive Strategy', 'Player Development'],
                    'Game Matchmaking' => ['Matchmaking Services', 'Game Pairing', 'Competitive Matches', 'Skill-Based Matchmaking'],
                    'Ingame Creation' => ['Custom In-Game Content', 'Modding Services', 'Game Design Assistance', 'Creative Assets'],
                    'Gameplay Experience & Feedback' => ['Gameplay Analysis', 'User Feedback', 'Experience Optimization', 'Playtesting'],
                    'Game Recordings & Guides' => ['Gameplay Recordings', 'Video Guides', 'Walkthroughs', 'Tips and Tricks']
                ],
                'Leisure & Hobbies' => [
                    'Astrology & Psychics' => ['Personal Readings', 'Astrological Charts', 'Tarot Readings', 'Psychic Consultations'],
                    'Arts & Crafts' => ['Craft Projects', 'DIY Tutorials', 'Art Workshops', 'Creative Projects'],
                    'Cosplay Creation' => ['Costume Design', 'Cosplay Consulting', 'Character Creation', 'Props and Accessories'],
                    'Puzzle & Game Creation' => ['Puzzle Design', 'Game Development', 'Board Games', 'Escape Room Design'],
                    'Traveling' => ['Travel Planning', 'Destination Advice', 'Travel Guides', 'Itinerary Creation'],
                    'Collectibles' => ['Antique Collecting', 'Comic Books', 'Rare Items', 'Collectible Consultation']
                ],
                'Miscellaneous' => [
                    'Family & Genealogy' => ['Family History Research', 'Genealogical Consultation', 'Ancestry Research', 'Family Tree Creation'],
                    'Cosmetics Formulation' => ['Custom Formulations', 'Cosmetic Product Development', 'Beauty Product Consulting', 'Ingredient Analysis'],
                    'Greeting Cards & Videos' => ['Custom Greeting Cards', 'Personalized Videos', 'Event Greetings', 'Occasion Cards'],
                    'Embroidery Digitizing' => ['Digitizing Services', 'Custom Embroidery Designs', 'Machine Embroidery Files', 'Embroidery Consultation'],
                    'Other' => ['Various Other Services']
                ]
            ]
        ];
        // Insert categories, subcategories, minsubcategories, and finers into the database
        foreach ($categories as $categoryName => $subcategories) {
            $category = Category::create(['name' => $categoryName]);

            foreach ($subcategories as $subcategoryName => $minsubcategories) {
                $subcategory = $category->subcategories()->create(['name' => $subcategoryName]);

                foreach ($minsubcategories as $minsubcategoryName => $finerItems) {
                    $minsubcategory = $subcategory->minsubcategories()->create(['name' => $minsubcategoryName]);

                    foreach ($finerItems as $finerName) {
                        Finer::create(['name' => $finerName, 'minsubcategory_id' => $minsubcategory->id]);
                    }
                }
            }
        }
    }
}
