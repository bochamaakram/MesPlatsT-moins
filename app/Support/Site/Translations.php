<?php

namespace App\Support\Site;

class Translations
{
    /**
     * English page content, keyed by slug, mirroring SiteDefaults::pages().
     *
     * @return array<string, array>
     */
    public static function en(): array
    {
        return [
            'accueil' => [
                'content' => [
                    'hero' => [
                        'badge' => 'Leading reference for collective catering & food service',
                        'title' => 'Simplify the management of your retained samples',
                        'paragraph' => 'Secure your liability, save time daily and be 100% compliant with ISO 22000 and HACCP food safety rules.',
                        'ctaPrimary' => 'Discover our solutions',
                        'ctaPrimaryHref' => '/solutions',
                        'ctaSecondary' => 'How to proceed?',
                        'ctaSecondaryHref' => '/comment-proceder',
                        'visual' => [
                            'Sampling in a sterile box',
                            'Labelled refrigerated racks',
                            'Traceability label printer',
                            'Hygienic kitchen preparation',
                        ],
                    ],
                    'pillarsIntro' => [
                        'eyebrow' => 'A complete guide for',
                        'title' => 'Daily management that must be mastered',
                        'lead' => 'Sampling and preserving retained meals is essential to protect your guests and meet HACCP requirements.',
                    ],
                    'pillars' => [
                        ['icon' => 'ClipboardList', 'title' => 'Sampling', 'desc' => 'Strict protocol, minimum portions of 80 to 100g on every prepared and served dish.'],
                        ['icon' => 'CheckCircle', 'title' => 'Identification', 'desc' => 'Complete labelling: date, time, service, exact dish name.'],
                        ['icon' => 'FlaskConical', 'title' => 'Storage', 'desc' => 'Positive cold storage (between 0°C and +3°C) for a mandatory 5 to 7 days.'],
                        ['icon' => 'Shield', 'title' => 'Traceability', 'desc' => 'Paper or digital record register available in the event of a health inspection.'],
                    ],
                    'solutionsIntro' => [
                        'eyebrow' => 'Our offer',
                        'title' => 'Simple solutions for catering professionals',
                        'lead' => 'Complete support and proven equipment to establish a smooth and secure process for your teams.',
                    ],
                    'solutions' => [
                        ['icon' => 'Settings', 'title' => 'Equip', 'desc' => 'Sterile consumables, zip bags, airtight boxes and dedicated racks.'],
                        ['icon' => 'BookOpen', 'title' => 'Guide', 'desc' => 'Protocol sheets, mandatory workstation posters and practical guides.'],
                        ['icon' => 'BarChart3', 'title' => 'Track', 'desc' => 'Software and quick-entry apps with automated barcode generation.'],
                        ['icon' => 'Users', 'title' => 'Support', 'desc' => 'Initial audit, bespoke advice and certified HACCP training for your teams.'],
                    ],
                    'chrIntro' => [
                        'eyebrow' => 'CHR',
                        'title' => 'A solution adapted to food service professionals',
                        'lead' => 'Whether you are an independent establishment or a large group, we meet your sampling obligations.',
                    ],
                    'chrTypes' => [
                        ['icon' => 'UtensilsCrossed', 'label' => 'Restaurants', 'sub' => 'Traditional, fine dining, buffets'],
                        ['icon' => 'Hotel', 'label' => 'Hotels', 'sub' => 'Room service, breakfasts, banquets'],
                        ['icon' => 'Users', 'label' => 'Caterers', 'sub' => 'Events, private and corporate receptions'],
                        ['icon' => 'Building2', 'label' => 'Central kitchens', 'sub' => 'Cold-link and hot-link catering'],
                        ['icon' => 'GraduationCap', 'label' => 'Canteens', 'sub' => 'Schools, nurseries, universities'],
                        ['icon' => 'HeartPulse', 'label' => 'Collective catering', 'sub' => 'Hospitals, clinics, care homes, companies'],
                    ],
                    'resourcesIntro' => [
                        'eyebrow' => 'Resources',
                        'title' => 'Everything you need',
                        'lead' => 'Access our practical resources and product ranges directly.',
                    ],
                    'resources' => [
                        ['title' => 'Your needs', 'desc' => 'Discover all the equipment and consumables suited to your meal volumes.', 'button' => 'Discover', 'href' => '/besoins'],
                        ['title' => 'How to proceed', 'desc' => 'Master the official step-by-step protocol to secure every meal served.', 'button' => 'See the protocol', 'href' => '/comment-proceder'],
                        ['title' => 'Regulations', 'desc' => 'Everything the law says: ministerial orders, retention periods and applicable penalties.', 'button' => 'Read', 'href' => '/reglementation'],
                    ],
                    'extrasIntro' => [
                        'eyebrow' => 'And more',
                        'title' => 'Go further in mastering your hygiene',
                        'lead' => '',
                    ],
                    'extras' => [
                        ['icon' => 'BarChart3', 'title' => 'Digital traceability', 'desc' => 'Cloud archiving and automated reminders.'],
                        ['icon' => 'Heart', 'title' => 'Hygiene support', 'desc' => 'On-site audit and validation of your Sanitary Control Plan (PMS).'],
                        ['icon' => 'Lightbulb', 'title' => 'Food service training - HACCP & BPH', 'desc' => 'Practical modules for your chefs and kitchen commis.'],
                    ],
                ],
            ],

            'besoins' => [
                'content' => [
                    'hero' => [
                        'badge' => 'Equipment & consumables',
                        'title' => 'Your needs: equipment & consumables suited to your covers',
                        'paragraph' => 'Discover all the equipment and consumables suited to your meal volumes, from the small independent restaurant to the central kitchen.',
                    ],
                    'categoriesIntro' => [
                        'eyebrow' => 'Our range',
                        'title' => 'Consumables & retained sample kits',
                        'lead' => 'Each range is designed to meet HACCP and ISO 22000 requirements: sampling, identification, storage and traceability.',
                    ],
                    'categories' => [
                        [
                            'icon' => 'Box',
                            'title' => 'Airtight boxes',
                            'desc' => 'Leak-proof transparent BPA-free boxes, positive-cold compatible, in several sizes.',
                            'items' => ['250 ml size', '500 ml size', '1000 ml size', 'Lockable lids'],
                        ],
                        [
                            'icon' => 'Package',
                            'title' => 'Sterile bags',
                            'desc' => 'Zip and heat-sealable single-use bags for sampling retained portions.',
                            'items' => ['Micro-perforated zip bags', 'Heat-sealable bags', 'Standard length rolls', 'Start-up kits'],
                        ],
                        [
                            'icon' => 'Printer',
                            'title' => 'Labelling & traceability',
                            'desc' => 'Pre-printed labels, thermal printer rolls and traceability registers.',
                            'items' => ['Food-grade labels', '57x40 thermal rolls', 'Paper register pads', 'Log books'],
                        ],
                        [
                            'icon' => 'ShoppingBag',
                            'title' => 'Racks & storage',
                            'desc' => 'Dedicated racks and containment bins to organise storage in refrigerated units.',
                            'items' => ['Stackable stainless racks', 'Labelled containment bins', 'Temperature control keys', 'Wall supports'],
                        ],
                    ],
                    'quantitiesIntro' => [
                        'eyebrow' => 'Budget simply',
                        'title' => 'Progressive kits based on your volume',
                        'lead' => 'From daily sampling to large banquets, our kits are sized by number of covers served.',
                    ],
                    'quantities' => [
                        ['label' => 'Small volume', 'sub' => 'Up to 100 covers / day', 'hint' => '2 to 4 retained samples'],
                        ['label' => 'Medium volume', 'sub' => '100 to 500 covers / day', 'hint' => '4 to 10 retained samples'],
                        ['label' => 'Large volume', 'sub' => 'Over 500 covers / day', 'hint' => '10+ retained samples / batches'],
                    ],
                    'cta' => [
                        'label' => 'Request a consumables quote',
                        'href' => '/contact',
                    ],
                ],
            ],

            'comment-proceder' => [
                'content' => [
                    'hero' => [
                        'badge' => 'HACCP protocol',
                        'title' => 'How to proceed: the complete retained meal guide',
                        'paragraph' => 'Official protocol, barrier measures, duration and temperature: follow the HACCP-compliant method step by step.',
                    ],
                    'keyFigures' => [
                        ['icon' => 'Scale', 'value' => '80g to 100g', 'label' => 'Minimum quantity per retained meal'],
                        ['icon' => 'CalendarDays', 'value' => '5 TO 7 DAYS', 'label' => 'Cold storage duration'],
                        ['icon' => 'Thermometer', 'value' => '0°C to +3°C', 'label' => 'Refrigerated storage temperature'],
                        ['icon' => 'UtensilsCrossed', 'value' => 'ALL DISHES', 'label' => 'Starters, hot dishes, desserts and sauces'],
                    ],
                    'stepsIntro' => [
                        'eyebrow' => '6-step protocol',
                        'title' => 'The chronological steps of the protocol',
                        'lead' => '',
                    ],
                    'steps' => [
                        [
                            'number' => '01',
                            'title' => 'THE SAMPLING MOMENT',
                            'principle' => 'Take the retained meal at the very end of the plating line or just before dispatch / service in the dining room.',
                            'details' => 'Never sample at the very start of cooking, so the sample accurately reflects the microbiological state of the dish served to the guest.',
                            'goodPractice' => 'Meticulous hand washing and wearing gloves at the sampling station.',
                            'icon' => 'Clock',
                        ],
                        [
                            'number' => '02',
                            'title' => 'THE RIGHT EQUIPMENT',
                            'principle' => 'Use exclusively sterile single-use consumables.',
                            'details' => 'Authorised equipment: sterile heat-sealable / zip plastic bags, leak-proof transparent airtight boxes without BPA.',
                            'goodPractice' => 'Operator opening a sterile bag with a disinfected utensil.',
                            'icon' => 'Package',
                        ],
                        [
                            'number' => '03',
                            'title' => 'QUANTITY AND SAMPLING',
                            'principle' => 'Take at least 80 to 100 net grams (or 100 ml for liquids and sauces).',
                            'details' => 'Every element of a composed plate (meat + sauce + garnish) must be represented or isolated if necessary.',
                            'goodPractice' => 'Weigh the retained portion and note the actual weight sampled.',
                            'icon' => 'Scale',
                        ],
                        [
                            'number' => '04',
                            'title' => 'IDENTIFICATION AND LABELLING',
                            'principle' => 'Mandatory information on the label: exact name of the dish or preparation, date of production and consumption (lunch / dinner service), sampling time, name or initials of the sampler, raw material batch number when the product is sensitive.',
                            'details' => 'A legible label ensures complete, usable traceability in the event of a health inspection.',
                            'goodPractice' => 'Barcode label printing and affixing on the retained box.',
                            'icon' => 'Tag',
                        ],
                        [
                            'number' => '05',
                            'title' => 'STORAGE AND TEMPERATURE',
                            'principle' => 'Refrigerated unit dedicated exclusively to retained meals.',
                            'details' => 'Strict thermal requirement: constant positive cold between 0°C and +3°C. Never freeze except under an explicit derogation specified in the PMS.',
                            'goodPractice' => 'Daily monitoring and recording of the unit temperature.',
                            'icon' => 'Snowflake',
                        ],
                        [
                            'number' => '06',
                            'title' => 'END-OF-LIFE MANAGEMENT AND DESTRUCTION',
                            'principle' => 'Keep for at least 5 full days (7 days for central kitchens serving weekends).',
                            'details' => 'Destruction: disposal through the organic-waste stream without prior opening to avoid any cross-contamination.',
                            'goodPractice' => 'Keeping the retained meal destruction register up to date.',
                            'icon' => 'Trash2',
                        ],
                    ],
                    'faqIntro' => [
                        'eyebrow' => 'Frequent questions',
                        'title' => 'FAQ',
                        'lead' => 'Find the answers to the most common questions.',
                    ],
                    'faq' => [
                        [
                            'question' => 'Should retained meals be frozen or refrigerated?',
                            'answer' => 'Refrigeration is mandatory at a maximum of +3°C in France and Morocco according to standard CHR guides. Freezing is excluded except for an explicit derogation provided for in the PMS (Sanitary Control Plan).',
                        ],
                        [
                            'question' => 'Who is authorised to perform the sampling?',
                            'answer' => "The sampling must be carried out by a person trained in good hygiene practices: HACCP manager, head chef or designated commis. Wearing gloves, washing hands and using sterile consumables are mandatory, and the sampler's name must appear on the label.",
                        ],
                        [
                            'question' => 'What to do in the event of an inspection by the fraud enforcement or veterinary services (ONSSA)?',
                            'answer' => 'Present your up-to-date traceability register, retained meals kept at the correct temperature and your HACCP procedures. A properly kept sample proves your compliance and protects your liability in the event of a foodborne outbreak (TIAC).',
                        ],
                    ],
                ],
            ],

            'reglementation' => [
                'content' => [
                    'hero' => [
                        'badge' => 'Legal texts & standards',
                        'title' => 'Regulations, guides & practical standards',
                        'paragraph' => 'Applicable legal texts, ministerial orders, HACCP method and official health inspections in Morocco and internationally.',
                        'searchPlaceholder' => 'Search a legal text, standard or term (e.g. 1997 Order, ONSSA, TIAC)...',
                    ],
                    'regulationsIntro' => [
                        'eyebrow' => 'Reference texts',
                        'title' => 'Reference texts',
                        'lead' => '',
                    ],
                    'regulations' => [
                        [
                            'tag' => 'Ministerial order',
                            'title' => 'Order of 29 September 1997',
                            'subtitle' => 'France / Collective catering reference',
                            'description' => 'Setting hygiene conditions applicable in collective catering establishments. Obligation to keep a representative sample of each dish.',
                            'keywords' => ['1997 Order', 'France', 'Collective catering', 'Restaurants'],
                        ],
                        [
                            'tag' => 'European regulation',
                            'title' => 'Hygiene Package',
                            'subtitle' => 'Regulations EC 178/2002 & EC 852/2004',
                            'description' => 'Upstream/downstream traceability, biological risk management and implementation of HACCP-based procedures.',
                            'keywords' => ['Hygiene Package', 'EC 178/2002', 'EC 852/2004', 'HACCP', 'Traceability'],
                        ],
                        [
                            'tag' => 'Moroccan law',
                            'title' => 'Law 28-07 on the food safety of food products',
                            'subtitle' => 'Morocco / ONSSA',
                            'description' => 'Health approval, food business operator obligations and self-checks.',
                            'keywords' => ['Law 28-07', 'Morocco', 'ONSSA', 'Health approval'],
                        ],
                        [
                            'tag' => 'International standard',
                            'title' => 'ISO 22000:2018 standard',
                            'subtitle' => 'Food safety management system (FSMS)',
                            'description' => 'Food safety management system (FSMS) to control hazards and guarantee safe food.',
                            'keywords' => ['ISO 22000', '2018', 'FSMS', 'Certification'],
                        ],
                        [
                            'tag' => 'Emergency protocol',
                            'title' => 'TIAC management',
                            'subtitle' => 'Collective Foodborne Outbreaks',
                            'description' => 'Protocol for placing retained meals under seal in the event of a medical or hospital alert.',
                            'keywords' => ['TIAC', 'Seizure', 'Alert', 'Veterinary'],
                        ],
                    ],
                    'tableIntro' => [
                        'eyebrow' => 'Summary table',
                        'title' => 'Health obligations by establishment type',
                        'lead' => '',
                    ],
                    'obligationTable' => [
                        ['type' => 'Collective Catering', 'obligation' => 'Strict & mandatory', 'plats' => 'All menus served', 'duree' => '5 clear days', 'temperature' => '0°C to +3°C'],
                        ['type' => 'Central Kitchens', 'obligation' => 'Strict & documented', 'plats' => 'Each dispatched batch', 'duree' => '7 days', 'temperature' => '0°C to +3°C'],
                        ['type' => 'Caterers / Receptions', 'obligation' => 'Strongly recommended / required over 30 covers', 'plats' => 'Cold & hot buffets', 'duree' => '5 days', 'temperature' => '0°C to +3°C'],
                        ['type' => 'Traditional Restaurants', 'obligation' => 'Recommended (PMS)', 'plats' => 'Daily menus / Sensitive dishes', 'duree' => '3 to 5 days', 'temperature' => '0°C to +3°C'],
                    ],
                    'downloadsIntro' => [
                        'eyebrow' => 'Download centre',
                        'title' => 'Practical sheets & PDF guides',
                        'lead' => '',
                    ],
                    'downloads' => [
                        ['title' => 'Retained Meal Protocol Memo Sheet A4 Laminated', 'type' => 'PDF', 'size' => '1.2 MB', 'href' => '#'],
                        ['title' => 'Manual Traceability Register Template for Retained Meals', 'type' => 'Excel / PDF', 'size' => '850 KB', 'href' => '#'],
                        ['title' => 'ONSSA / HACCP Good Hygiene Practices Guide for Catering', 'type' => 'PDF', 'size' => '2.4 MB', 'href' => '#'],
                    ],
                ],
            ],

            'solutions' => [
                'content' => [
                    'hero' => [
                        'badge' => 'Equipment & software',
                        'title' => 'Simple solutions for certified catering',
                        'paragraph' => 'Complete support and proven equipment to establish a smooth and secure process for your teams.',
                    ],
                    'offers' => [
                        [
                            'icon' => 'Settings',
                            'title' => 'Equip',
                            'desc' => 'Sterile consumables, zip bags, airtight boxes and dedicated racks suited to your covers.',
                            'features' => ['BPA-free boxes', 'Single-use sterile bags', 'Racks and containment bins'],
                        ],
                        [
                            'icon' => 'BookOpen',
                            'title' => 'Guide',
                            'desc' => 'Protocol sheets, mandatory workstation posters and practical guides.',
                            'features' => ['Laminated workstation sheets', 'HACCP posters', 'Operator guides'],
                        ],
                        [
                            'icon' => 'BarChart3',
                            'title' => 'Track',
                            'desc' => 'Software and quick-entry apps with automated barcode generation.',
                            'features' => ['Quick touch entry', 'Barcode generation', 'Cloud archiving and reminders'],
                        ],
                        [
                            'icon' => 'Users',
                            'title' => 'Support',
                            'desc' => 'Initial audit, bespoke advice and certified HACCP training for your teams.',
                            'features' => ['On-site audit', 'PMS advice', 'Certified training'],
                        ],
                    ],
                    'digitalIntro' => [
                        'eyebrow' => 'Digital traceability',
                        'title' => 'Move to the digital register',
                        'lead' => 'Simplify daily data entry and archive your compliance evidence automatically.',
                    ],
                    'digital' => [
                        ['icon' => 'QrCode', 'title' => 'Automated labelling', 'desc' => 'Barcodes and QR codes printed in one click from the tablet.'],
                        ['icon' => 'Cloud', 'title' => 'Cloud archiving', 'desc' => 'Digital register retention and automated destruction reminders.'],
                        ['icon' => 'ShieldCheck', 'title' => 'HACCP compliant', 'desc' => 'Guided fields matching exactly the mandatory label information.'],
                        ['icon' => 'GraduationCap', 'title' => 'Integrated training', 'desc' => 'Practical modules for your chefs and kitchen commis.'],
                    ],
                    'cta' => [
                        'title' => 'Discover the solution for your establishment',
                        'paragraph' => 'Initial audit, bespoke advice and certified HACCP training for your teams.',
                        'primaryLabel' => 'Contact us',
                        'primaryHref' => '/contact',
                        'secondaryLabel' => 'See the consumables',
                        'secondaryHref' => '/besoins',
                    ],
                ],
            ],

            'contact' => [
                'content' => [
                    'hero' => [
                        'badge' => 'Contact us',
                        'title' => 'A need? Let us talk.',
                        'paragraph' => 'Consumables, training, hygiene support or any other request: share your need and our team of catering professionals will get back to you.',
                        'visualHint' => 'Client advisor / hygiene auditor at your service',
                    ],
                    'formTitle' => 'Send us your request',
                    'formLead' => 'A few details will help us understand your need better and provide the most suitable response.',
                    'infoTitle' => 'Our contact details',
                    'contactInfo' => [
                        ['label' => 'Email', 'value' => 'contact@mesplatstemoins.ma', 'href' => 'mailto:contact@mesplatstemoins.ma'],
                        ['label' => 'Phone', 'value' => '+212 (0) 6 400 10 200', 'href' => 'tel:+212640010200'],
                        ['label' => 'Location', 'value' => 'Marrakech, Morocco — Services available in Morocco.', 'href' => ''],
                        ['label' => 'Hours', 'value' => 'Monday - Friday, 08:30 - 18:00', 'href' => ''],
                    ],
                    'directTitle' => 'Prefer to talk directly?',
                    'callLabel' => 'Call us',
                    'whatsappLabel' => 'WhatsApp direct',
                ],
            ],
        ];
    }

    /**
     * Arabic page content, keyed by slug, mirroring SiteDefaults::pages().
     *
     * @return array<string, array>
     */
    public static function ar(): array
    {
        return [
            'accueil' => [
                'content' => [
                    'hero' => [
                        'badge' => 'المرجع الأول للتموين الجماعي ومهنيي المطاعم والفنادق والمقاهي',
                        'title' => 'بسّط إدارة أطباقك الاحتياطية',
                        'paragraph' => 'أمّن مسؤوليتك، ووفّر الوقت يومياً، وكن مطابقاً 100% لمعيار ISO 22000 والقواعد الصحية HACCP.',
                        'ctaPrimary' => 'اكتشف حلولنا',
                        'ctaPrimaryHref' => '/solutions',
                        'ctaSecondary' => 'كيف نعمل؟',
                        'ctaSecondaryHref' => '/comment-proceder',
                        'visual' => [
                            'أخذ العينة في علبة معقّمة',
                            'رفوف مبرّدة موسومة',
                            'طابعة ملصقات التتبّع',
                            'تحضير صحّي في المطبخ',
                        ],
                    ],
                    'pillarsIntro' => [
                        'eyebrow' => 'دليل كامل لـ',
                        'title' => 'إدارة يومية يجب إتقانها',
                        'lead' => 'أخذ وحفظ الوجبات الاحتياطية أمر أساسي لحماية ضيوفك والاستجابة لمتطلبات HACCP.',
                    ],
                    'pillars' => [
                        ['icon' => 'ClipboardList', 'title' => 'أخذ العينة', 'desc' => 'بروتوكول صارم، حصص لا تقل عن 80 إلى 100 غرام لكل طبق مُحضّر ومُقدّم.'],
                        ['icon' => 'CheckCircle', 'title' => 'التعريف', 'desc' => 'وسم كامل: التاريخ، الساعة، الوجبة، التسمية الدقيقة للطبق.'],
                        ['icon' => 'FlaskConical', 'title' => 'الحفظ', 'desc' => 'التخزين في البرد الإيجابي (بين 0°C و+3°C) لمدة إلزامية من 5 إلى 7 أيام.'],
                        ['icon' => 'Shield', 'title' => 'التتبّع', 'desc' => 'سجل تسجيل ورقي أو رقمي متاح في حالة المراقبة الصحية.'],
                    ],
                    'solutionsIntro' => [
                        'eyebrow' => 'عرضنا',
                        'title' => 'حلول بسيطة لمهنيي المطاعم',
                        'lead' => 'مرافقة شاملة ومعدات مجرّبة لتركيب عملية سلسة وآمنة لفرقك.',
                    ],
                    'solutions' => [
                        ['icon' => 'Settings', 'title' => 'تجهيز', 'desc' => 'مستهلكات معقّمة، أكياس مضغوطة، علب محكمة الإغلاق ورفوف مخصّصة.'],
                        ['icon' => 'BookOpen', 'title' => 'إرشاد', 'desc' => 'أوراق بروتوكول، لافتات إلزامية لمحطات العمل وأدلة عملية.'],
                        ['icon' => 'BarChart3', 'title' => 'تتبّع', 'desc' => 'برامج وتطبيقات إدخال سريع مع توليد تلقائي للرموز الشريطية.'],
                        ['icon' => 'Users', 'title' => 'مرافقة', 'desc' => 'تدقيق أولي، نصيحة مخصصة وتكوين معتمَد في HACCP لفرقك.'],
                    ],
                    'chrIntro' => [
                        'eyebrow' => 'CHR',
                        'title' => 'حل متكيّف مع مهنيي قطاع المطاعم والفنادق والمقاهي',
                        'lead' => 'سواء كنت مؤسسة مستقلة أو مجموعة كبيرة، نلبي التزاماتك في أخذ العينات.',
                    ],
                    'chrTypes' => [
                        ['icon' => 'UtensilsCrossed', 'label' => 'مطاعم', 'sub' => 'تقليدية، راقية، بوفيهات'],
                        ['icon' => 'Hotel', 'label' => 'فنادق', 'sub' => 'خدمة الغرف، الفطور، حفلات الاستقبال'],
                        ['icon' => 'Users', 'label' => 'مزوّدو الخدمة', 'sub' => 'مناسبات، حفلات خاصة ومهنية'],
                        ['icon' => 'Building2', 'label' => 'مطابخ مركزية', 'sub' => 'ربط بارد وربط ساخن'],
                        ['icon' => 'GraduationCap', 'label' => 'مقاصف', 'sub' => 'مدارس، حضانات، جامعات'],
                        ['icon' => 'HeartPulse', 'label' => 'تموين جماعي', 'sub' => 'مستشفيات، عيادات، دور المسنين، شركات'],
                    ],
                    'resourcesIntro' => [
                        'eyebrow' => 'موارد',
                        'title' => 'كل ما تحتاجه',
                        'lead' => 'اطّلع مباشرة على مواردنا العملية ومجموعات منتجاتنا.',
                    ],
                    'resources' => [
                        ['title' => 'احتياجاتك', 'desc' => 'اكتشف جميع المعدات والمستهلكات الملائمة لحجم وجباتك.', 'button' => 'اكتشف', 'href' => '/besoins'],
                        ['title' => 'كيف نعمل', 'desc' => 'أتقن البروتوكول الرسمي خطوة بخطوة لتأمين كل وجبة تُقدَّم.', 'button' => 'شاهد البروتوكول', 'href' => '/comment-proceder'],
                        ['title' => 'التشريعات', 'desc' => 'كل ما ينصّ عليه القانون: الأوامر الوزارية، مدد الاحتفاظ والعقوبات المطبّقة.', 'button' => 'اطّلع', 'href' => '/reglementation'],
                    ],
                    'extrasIntro' => [
                        'eyebrow' => 'والمزيد',
                        'title' => 'اذهب أبعد في إتقان النظافة لديك',
                        'lead' => '',
                    ],
                    'extras' => [
                        ['icon' => 'BarChart3', 'title' => 'التتبّع الرقمي', 'desc' => 'أرشفة سحابية وتذكيرات تلقائية.'],
                        ['icon' => 'Heart', 'title' => 'مرافقة النظافة', 'desc' => 'تدقيق في الموقع والتحقق من خطة المراقبة الصحية PMS.'],
                        ['icon' => 'Lightbulb', 'title' => 'تكوين CHR – HACCP وBPH', 'desc' => 'وحدات عملية لرؤساء الطهاة ومساعدي المطبخ.'],
                    ],
                ],
            ],

            'besoins' => [
                'content' => [
                    'hero' => [
                        'badge' => 'معدات ومستهلكات',
                        'title' => 'احتياجاتك: معدات ومستهلكات ملائمة لعدد وجباتك',
                        'paragraph' => 'اكتشف جميع المعدات والمستهلكات الملائمة لحجم وجباتك، من المطعم المستقل الصغير إلى المطبخ المركزي.',
                    ],
                    'categoriesIntro' => [
                        'eyebrow' => 'مجموعتنا',
                        'title' => 'مستهلكات وأطقم الأطباق الاحتياطية',
                        'lead' => 'كل مجموعة مصمّمة لتلبية متطلبات HACCP وISO 22000: أخذ العينات، التعريف، الحفظ والتتبّع.',
                    ],
                    'categories' => [
                        [
                            'icon' => 'Box',
                            'title' => 'علب محكمة الإغلاق',
                            'desc' => 'علب شفافة مانعة للتسرب خالية من BPA، متوافقة مع البرد الإيجابي، بعدة أحجام.',
                            'items' => ['حجم 250 مل', 'حجم 500 مل', 'حجم 1000 مل', 'أغطية قابلة للقفل'],
                        ],
                        [
                            'icon' => 'Package',
                            'title' => 'أكياس معقّمة',
                            'desc' => 'أكياس مضغوطة وأكياس قابلة للسد الحراري للاستعمال الواحد لأخذ الحصص الاحتياطية.',
                            'items' => ['أكياس مضغوطة مثقّبة', 'أكياس سد حراري', 'لفائف بالطول القياسي', 'أطقم تشغيل'],
                        ],
                        [
                            'icon' => 'Printer',
                            'title' => 'الوسم والتتبّع',
                            'desc' => 'ملصقات مطبوعة مسبقاً، لفائف طابعة حرارية وسجلات تتبّع.',
                            'items' => ['ملصقات صالحة للغذاء', 'لفائف حرارية 57x40', 'دفاتر سجل ورقي', 'دفاتر النقط'],
                        ],
                        [
                            'icon' => 'ShoppingBag',
                            'title' => 'رفوف وتخزين',
                            'desc' => 'رفوف مخصّصة وأحواض احتواء لتنظيم التخزين في الوحدات المبرّدة.',
                            'items' => ['رفوف فولاذية قابلة للتكديس', 'أحواض احتواء موسومة', 'مفاتيح مراقبة الحرارة', 'دعامات حائطية'],
                        ],
                    ],
                    'quantitiesIntro' => [
                        'eyebrow' => 'بسّط ميزانيتك',
                        'title' => 'أطقم تدريجية حسب حجم نشاطك',
                        'lead' => 'من أخذ العينات اليومي إلى حفلات الاستقبال الكبيرة، أطقمنا مقاسة بعدد الوجبات المقدّمة.',
                    ],
                    'quantities' => [
                        ['label' => 'حجم صغير', 'sub' => 'حتى 100 وجبة / يوم', 'hint' => '2 إلى 4 أطباق احتياطية'],
                        ['label' => 'حجم متوسط', 'sub' => '100 إلى 500 وجبة / يوم', 'hint' => '4 إلى 10 أطباق احتياطية'],
                        ['label' => 'حجم كبير', 'sub' => 'أكثر من 500 وجبة / يوم', 'hint' => '10+ أطباق احتياطية / دفعات'],
                    ],
                    'cta' => [
                        'label' => 'اطلب عرض أسعار للمستهلكات',
                        'href' => '/contact',
                    ],
                ],
            ],

            'comment-proceder' => [
                'content' => [
                    'hero' => [
                        'badge' => 'بروتوكول HACCP',
                        'title' => 'كيف نعمل: الدليل الكامل للطبق الاحتياطي',
                        'paragraph' => 'البروتوكول الرسمي، إجراءات الوقاية، المدّة ودرجة الحرارة: اتبع الطريقة المتوافقة مع HACCP خطوة بخطوة.',
                    ],
                    'keyFigures' => [
                        ['icon' => 'Scale', 'value' => '80غ إلى 100غ', 'label' => 'الكمية الدنيا لكل طبق احتياطي'],
                        ['icon' => 'CalendarDays', 'value' => '5 إلى 7 أيام', 'label' => 'مدة الحفظ في البرد'],
                        ['icon' => 'Thermometer', 'value' => '0°C إلى +3°C', 'label' => 'درجة حرارة التخزين المبرّد'],
                        ['icon' => 'UtensilsCrossed', 'value' => 'جميع الأطباق', 'label' => 'مقبّلات، أطباق ساخنة، حلويات وصلصات'],
                    ],
                    'stepsIntro' => [
                        'eyebrow' => 'بروتوكول من 6 خطوات',
                        'title' => 'الخطوات الزمنية للبروتوكول',
                        'lead' => '',
                    ],
                    'steps' => [
                        [
                            'number' => '01',
                            'title' => 'لحظة أخذ العينة',
                            'principle' => 'خذ الطبق الاحتياطي في نهاية خط التقديم أو مباشرة قبل مغادرة التوزيع / الخدمة في القاعة.',
                            'details' => 'لا تأخذ العينة في بداية الطهي أبداً لضمان أن يعكس النموذج بدقة الحالة الميكروبية للطبق المقدّم للضيف.',
                            'goodPractice' => 'غسل دقيق لليدين وارتداء القفازات في محطة أخذ العينات.',
                            'icon' => 'Clock',
                        ],
                        [
                            'number' => '02',
                            'title' => 'المعدات المناسبة',
                            'principle' => 'استخدم حصراً مستهلكات معقّمة للاستعمال الواحد.',
                            'details' => 'المعدات المسموحة: أكياس بلاستيكية معقّمة قابلة للسد/الضغط، علب محكمة شفافة مانعة للتسرب بدون BPA.',
                            'goodPractice' => 'عامل يفتح كيساً معقّماً بأداة مطهّرة.',
                            'icon' => 'Package',
                        ],
                        [
                            'number' => '03',
                            'title' => 'الكمية وأخذ العينات',
                            'principle' => 'خذ على الأقل من 80 إلى 100 غرام صافٍ (أو 100 مل للسوائل والصلصات).',
                            'details' => 'يجب أن يكون كل عنصر من طبق مركّب (لحم + صلصة + مقبّل) ممثلاً أو معزولاً عند الضرورة.',
                            'goodPractice' => 'ازن الحصة الاحتياطية وسجّل الوزن الفعلي المأخوذ.',
                            'icon' => 'Scale',
                        ],
                        [
                            'number' => '04',
                            'title' => 'التعريف والوسم',
                            'principle' => 'المعلومات الإلزامية على الملصق: الاسم الدقيق للطبق أو التحضيرة، تاريخ الصنع والاستهلاك (وجبة ظهر/مساء)، ساعة أخذ العينة، اسم أو الأحرف الأولى من اسم الآخذ، رقم دفعة المادة الأولية في حالة المنتج الحساس.',
                            'details' => 'الملصق الواضح يضمن تتبّعاً كاملاً وقابل للاستعمال في حالة المراقبة الصحية.',
                            'goodPractice' => 'طباعة ملصق رمز شريطي ولصقه على علبة الطبق الاحتياطي.',
                            'icon' => 'Tag',
                        ],
                        [
                            'number' => '05',
                            'title' => 'التخزين ودرجة الحرارة',
                            'principle' => 'وحدة تبريد مخصّصة حصراً للأطباق الاحتياطية.',
                            'details' => 'اشتراط حراري صارم: برد إيجابي ثابت بين 0°C و+3°C. لا تجميد أبداً إلا بترخيص صريح محدّد في خطة المراقبة الصحية PMS.',
                            'goodPractice' => 'مراقبة وتسجيل يومي لدرجة حرارة الوحدة.',
                            'icon' => 'Snowflake',
                        ],
                        [
                            'number' => '06',
                            'title' => 'تدبير نهاية الاستعمال والإتلاف',
                            'principle' => 'الحفظ لمدة 5 أيام كاملة على الأقل (7 أيام للمطابخ المركزية التي تخدم نهاية الأسبوع).',
                            'details' => 'الإتلاف: التخلص عبر مسار النفايات العضوية دون فتح مسبق لتجنّب أي تلوث متصالب.',
                            'goodPractice' => 'الحرص على تحديث سجل إتلاف الأطباق الاحتياطية.',
                            'icon' => 'Trash2',
                        ],
                    ],
                    'faqIntro' => [
                        'eyebrow' => 'أسئلة متكررة',
                        'title' => 'الأسئلة الشائعة',
                        'lead' => 'تجد هنا إجابات أكثر الأسئلة شيوعاً.',
                    ],
                    'faq' => [
                        [
                            'question' => 'هل يجب تجميد أو تبريد الأطباق الاحتياطية؟',
                            'answer' => 'التبريد إلزامي بحد أقصى +3°C في فرنسا والمغرب وفق أدلة CHR القياسية. يُستبعد التجميد إلا بترخيص صريح منصوص عليه في خطة المراقبة الصحية PMS.',
                        ],
                        [
                            'question' => 'من له حق أخذ العينة؟',
                            'answer' => 'يجب أن يتم أخذ العينة من قبل شخص مكوّن في الممارسات الجيدة للنظافة: مسؤول HACCP، رئيس طهاة أو مساعد معيّن. ارتداء القفازات، غسل اليدين واستخدام مستهلكات معقّمة أمر إلزامي، ويجب إدراج اسم الآخذ على الملصق.',
                        ],
                        [
                            'question' => 'ماذا أفعل في حالة مراقبة قمع الغش أو المصالح البيطرية (ONSSA)؟',
                            'answer' => 'قدّم سجل التتبّع المحدّث، الأطباق الاحتياطية المحفوظة في الحرارة المناسبة وإجراءات HACCP الخاصة بك. العينة المحفوظة جيداً تُثبت امتثالك وتحمي مسؤوليتك في حالة تسمم غذائي جماعي (TIAC).',
                        ],
                    ],
                ],
            ],

            'reglementation' => [
                'content' => [
                    'hero' => [
                        'badge' => 'نصوص قانونية ومعايير',
                        'title' => 'التشريعات والأدلة والمعايير العملية',
                        'paragraph' => 'نصوص قانونية سارية، أوامر وزارية، طريقة HACCP ومراقبات صحية رسمية في المغرب ودولياً.',
                        'searchPlaceholder' => 'ابحث عن نص قانوني، معيار أو مصطلح (مثال: أمر 1997، ONSSA، TIAC)...',
                    ],
                    'regulationsIntro' => [
                        'eyebrow' => 'نصوص مرجعية',
                        'title' => 'النصوص المرجعية',
                        'lead' => '',
                    ],
                    'regulations' => [
                        [
                            'tag' => 'أمر وزاري',
                            'title' => 'أمر 29 شتنبر 1997',
                            'subtitle' => 'فرنسا / مرجع التموين الجماعي',
                            'description' => 'يحدد شروط النظافة المطبقة في مؤسسات التموين الجماعي، مع إلزامية حفظ عينة ممثّلة لكل طبق.',
                            'keywords' => ['أمر 1997', 'فرنسا', 'التموين الجماعي', 'مطاعم'],
                        ],
                        [
                            'tag' => 'لائحة أوروبية',
                            'title' => 'حزمة النظافة',
                            'subtitle' => 'اللائحتان CE 178/2002 وCE 852/2004',
                            'description' => 'تتبّع صعوداً وهبوطاً، تدبير المخاطر البيولوجية وإرساء إجراءات مبنية على HACCP.',
                            'keywords' => ['حزمة النظافة', 'CE 178/2002', 'CE 852/2004', 'HACCP', 'تتبّع'],
                        ],
                        [
                            'tag' => 'قانون مغربي',
                            'title' => 'قانون 28-07 المتعلق بالسلامة الصحية للمنتجات الغذائية',
                            'subtitle' => 'المغرب / ONSSA',
                            'description' => 'الاعتماد الصحي، التزامات المستغلين الغذائيين والمراقبات الذاتية.',
                            'keywords' => ['قانون 28-07', 'المغرب', 'ONSSA', 'اعتماد صحي'],
                        ],
                        [
                            'tag' => 'معيار دولي',
                            'title' => 'معيار ISO 22000:2018',
                            'subtitle' => 'نظام إدارة سلامة الأغذية (SMSDA)',
                            'description' => 'نظام إدارة سلامة الأغذية (SMSDA) للتحكم في المخاطر وضمان أغذية آمنة.',
                            'keywords' => ['ISO 22000', '2018', 'SMSDA', 'شهادة'],
                        ],
                        [
                            'tag' => 'بروتوكول طوارئ',
                            'title' => 'تدبير التسممات الغذائية الجماعية TIAC',
                            'subtitle' => 'التسممات الغذائية الجماعية',
                            'description' => 'بروتوكول وضع الأطباق الاحتياطية تحت الحجز في حالة تنبيه طبي أو مستشفوي.',
                            'keywords' => ['TIAC', 'حجز', 'تنبيه', 'أطباء بيطريون'],
                        ],
                    ],
                    'tableIntro' => [
                        'eyebrow' => 'جدول موجز',
                        'title' => 'الالتزامات الصحية حسب نوع المؤسسة',
                        'lead' => '',
                    ],
                    'obligationTable' => [
                        ['type' => 'التموين الجماعي', 'obligation' => 'صارم وإلزامي', 'plats' => 'جميع القوائم المقدّمة', 'duree' => '5 أيام كاملة', 'temperature' => '0°C إلى +3°C'],
                        ['type' => 'المطابخ المركزية', 'obligation' => 'صارم وموثّق', 'plats' => 'كل دفعة مرسلة', 'duree' => '7 أيام', 'temperature' => '0°C إلى +3°C'],
                        ['type' => 'مزوّدون / حفلات', 'obligation' => 'موصى به بشدة / مطلوب لأكثر من 30 وجبة', 'plats' => 'بوفيهات باردة وساخنة', 'duree' => '5 أيام', 'temperature' => '0°C إلى +3°C'],
                        ['type' => 'مطاعم تقليدية', 'obligation' => 'موصى به (PMS)', 'plats' => 'قوائم اليوم / الأطباق الحساسة', 'duree' => '3 إلى 5 أيام', 'temperature' => '0°C إلى +3°C'],
                    ],
                    'downloadsIntro' => [
                        'eyebrow' => 'مركز التحميل',
                        'title' => 'أوراق عملية وأدلة PDF',
                        'lead' => '',
                    ],
                    'downloads' => [
                        ['title' => 'ورقة تذكير ببروتوكول الطبق الاحتياطي A4 مغلّفة', 'type' => 'PDF', 'size' => '1.2 ميغابايت', 'href' => '#'],
                        ['title' => 'نموذج سجل ورقي لتتبّع الأطباق الاحتياطية', 'type' => 'Excel / PDF', 'size' => '850 كيلوبايت', 'href' => '#'],
                        ['title' => 'دليل ONSSA / HACCP للممارسات الجيدة للنظافة في المطاعم', 'type' => 'PDF', 'size' => '2.4 ميغابايت', 'href' => '#'],
                    ],
                ],
            ],

            'solutions' => [
                'content' => [
                    'hero' => [
                        'badge' => 'معدات وبرمجيات',
                        'title' => 'حلول بسيطة للمطاعم المعتمدة',
                        'paragraph' => 'مرافقة شاملة ومعدات مجرّبة لتركيب عملية سلسة وآمنة لفرقك.',
                    ],
                    'offers' => [
                        [
                            'icon' => 'Settings',
                            'title' => 'تجهيز',
                            'desc' => 'مستهلكات معقّمة، أكياس مضغوطة، علب محكمة ورفوف مخصّصة ملائمة لوجباتك.',
                            'features' => ['علب خالية من BPA', 'أكياس معقّمة للاستعمال الواحد', 'رفوف وأحواض احتواء'],
                        ],
                        [
                            'icon' => 'BookOpen',
                            'title' => 'إرشاد',
                            'desc' => 'أوراق بروتوكول، لافتات إلزامية لمحطات العمل وأدلة عملية.',
                            'features' => ['أوراق محطات مغلّفة', 'لافتات HACCP', 'أدلة المستخدمين'],
                        ],
                        [
                            'icon' => 'BarChart3',
                            'title' => 'تتبّع',
                            'desc' => 'برمجيات وتطبيقات إدخال سريع مع توليد تلقائي للرموز الشريطية.',
                            'features' => ['إدخال سريع باللمس', 'توليد رموز شريطية', 'أرشفة سحابية وتذكيرات'],
                        ],
                        [
                            'icon' => 'Users',
                            'title' => 'مرافقة',
                            'desc' => 'تدقيق أولي، نصيحة مخصصة وتكوين معتمَد في HACCP لفرقك.',
                            'features' => ['تدقيق في الموقع', 'نصيحة PMS', 'تكوين معتمَد'],
                        ],
                    ],
                    'digitalIntro' => [
                        'eyebrow' => 'تتبّع رقمي',
                        'title' => 'انتقل إلى السجل الرقمي',
                        'lead' => 'بسّط الإدخال اليومي وأرشف أدلة امتثالك تلقائياً.',
                    ],
                    'digital' => [
                        ['icon' => 'QrCode', 'title' => 'وسم تلقائي', 'desc' => 'رموز شريطية ورموز QR تُطبع بنقرة واحدة من اللوحة الرقمية.'],
                        ['icon' => 'Cloud', 'title' => 'أرشفة سحابية', 'desc' => 'حفظ السجلات الرقمية وتذكيرات تلقائية بالإتلاف.'],
                        ['icon' => 'ShieldCheck', 'title' => 'مطابق لمعيار HACCP', 'desc' => 'حقول إرشادية تعكس بالضبط المعلومات الإلزامية للملصق.'],
                        ['icon' => 'GraduationCap', 'title' => 'تكوين مدمج', 'desc' => 'وحدات عملية لرؤساء الطهاة ومساعدي المطبخ.'],
                    ],
                    'cta' => [
                        'title' => 'اكتشف الحل المناسب لمؤسستك',
                        'paragraph' => 'تدقيق أولي، نصيحة مخصصة وتكوين معتمَد في HACCP لفرقك.',
                        'primaryLabel' => 'اتصل بنا',
                        'primaryHref' => '/contact',
                        'secondaryLabel' => 'شاهد المستهلكات',
                        'secondaryHref' => '/besoins',
                    ],
                ],
            ],

            'contact' => [
                'content' => [
                    'hero' => [
                        'badge' => 'اتصل بنا',
                        'title' => 'لديك حاجة؟ لنتحدث.',
                        'paragraph' => 'مستهلكات، تكوين، مرافقة في النظافة أو أي طلب آخر: قدّم حاجتك وسيتواصل معك فريقنا من مهنيي المطاعم.',
                        'visualHint' => 'مستشارة عملاء / مدققة صحية في خدمتك',
                    ],
                    'formTitle' => 'أرسل إلينا طلبك',
                    'formLead' => 'بعض المعلومات ستساعدنا على فهم حاجتك بشكل أفضل وتقديم الإجابة الأنسب.',
                    'infoTitle' => 'بيانات التواصل',
                    'contactInfo' => [
                        ['label' => 'البريد الإلكتروني', 'value' => 'contact@mesplatstemoins.ma', 'href' => 'mailto:contact@mesplatstemoins.ma'],
                        ['label' => 'الهاتف', 'value' => '+212 (0) 6 400 10 200', 'href' => 'tel:+212640010200'],
                        ['label' => 'الموقع', 'value' => 'مراكش، المغرب — الخدمات والمرافقة متوفرة في المغرب.', 'href' => ''],
                        ['label' => 'أوقات العمل', 'value' => 'الإثنين - الجمعة، 08:30 - 18:00', 'href' => ''],
                    ],
                    'directTitle' => 'تفضّل التواصل المباشر؟',
                    'callLabel' => 'اتصل بنا',
                    'whatsappLabel' => 'واتساب مباشر',
                ],
            ],
        ];
    }

    /**
     * Per-language slugs for each CMS page.
     *
     * @return array<string, array<string, string>>
     */
    public static function slugs(): array
    {
        return [
            'accueil' => ['fr' => 'accueil', 'en' => 'home', 'ar' => 'الرئيسية'],
            'besoins' => ['fr' => 'besoins', 'en' => 'your-needs', 'ar' => 'احتياجاتك'],
            'comment-proceder' => ['fr' => 'comment-proceder', 'en' => 'how-to-proceed', 'ar' => 'كيف-نعمل'],
            'reglementation' => ['fr' => 'reglementation', 'en' => 'regulations', 'ar' => 'التشريعات'],
            'solutions' => ['fr' => 'solutions', 'en' => 'solutions', 'ar' => 'الحلول'],
            'contact' => ['fr' => 'contact', 'en' => 'contact', 'ar' => 'اتصل-بنا'],
        ];
    }
}
