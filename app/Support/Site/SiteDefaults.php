<?php

namespace App\Support\Site;

class SiteDefaults
{
    /**
     * Default content for every CMS page, keyed by slug.
     *
     * @return array<string, array>
     */
    public static function pages(): array
    {
        return [
            'accueil' => [
                'title' => 'Accueil',
                'description' => 'Le site de référence de la gestion des plats témoins pour les professionnels CHR et la restauration collective.',
                'content' => [
                    'hero' => [
                        'badge' => 'Référence de la restauration collective & CHR',
                        'title' => 'Simplifiez la gestion de vos plats témoins',
                        'paragraph' => 'Sécurisez votre responsabilité, gagnez du temps au quotidien et soyez 100% conforme à la norme ISO 22000 et aux règles sanitaires HACCP.',
                        'ctaPrimary' => 'Découvrir nos solutions',
                        'ctaPrimaryHref' => '/solutions',
                        'ctaSecondary' => 'Comment procéder ?',
                        'ctaSecondaryHref' => '/comment-proceder',
                        'visual' => [
                            'Prélèvement dans boîte stérile',
                            'Portoirs réfrigérés étiquetés',
                            'Imprimante étiquettes traçabilité',
                            'Préparation hygiénique en cuisine',
                        ],
                    ],
                    'pillarsIntro' => [
                        'eyebrow' => 'Guide complet pour',
                        'title' => 'Une gestion quotidienne qui doit être maîtrisée',
                        'lead' => 'Le prélèvement et la conservation des repas témoins sont indispensables pour protéger vos convives et répondre aux exigences de la méthode HACCP.',
                    ],
                    'pillars' => [
                        ['icon' => 'ClipboardList', 'title' => 'Prélèvement', 'desc' => 'Protocole strict, portions minimales de 80 à 100g sur chaque préparation servie.'],
                        ['icon' => 'CheckCircle', 'title' => 'Identification', 'desc' => 'Étiquetage complet : date, heure, service, dénomination exacte du plat.'],
                        ['icon' => 'FlaskConical', 'title' => 'Conservation', 'desc' => 'Stockage au froid positif (entre 0°C et +3°C) pendant un délai obligatoire de 5 à 7 jours.'],
                        ['icon' => 'Shield', 'title' => 'Traçabilité', 'desc' => "Registre d'enregistrement papier ou digitalisé accessible en cas de contrôle sanitaire."],
                    ],
                    'solutionsIntro' => [
                        'eyebrow' => 'Notre offre',
                        'title' => 'Des solutions simples pour les professionnels de la restauration',
                        'lead' => 'Un accompagnement complet et du matériel éprouvé pour instaurer un processus fluide et sécurisé pour vos équipes.',
                    ],
                    'solutions' => [
                        ['icon' => 'Settings', 'title' => 'Équiper', 'desc' => 'Consommables stériles, sachets zip, boîtes hermétiques et portoirs dédiés.'],
                        ['icon' => 'BookOpen', 'title' => 'Guider', 'desc' => 'Fiches protocoles, affichages obligatoires pour poste de travail et guides pratiques.'],
                        ['icon' => 'BarChart3', 'title' => 'Tracer', 'desc' => 'Logiciels et applications de saisie rapide avec édition automatisée de code-barres.'],
                        ['icon' => 'Users', 'title' => 'Accompagner', 'desc' => 'Audit initial, conseil sur-mesure et formation HACCP certifiante de vos équipes.'],
                    ],
                    'chrIntro' => [
                        'eyebrow' => 'CHR',
                        'title' => 'Une solution adaptée aux professionnels CHR',
                        'lead' => 'Que vous soyez un établissement indépendant ou un grand groupe, nous répondons à vos obligations de prélèvement.',
                    ],
                    'chrTypes' => [
                        ['icon' => 'UtensilsCrossed', 'label' => 'Restaurants', 'sub' => 'Traditionnels, gastronomiques, buffets'],
                        ['icon' => 'Hotel', 'label' => 'Hôtels', 'sub' => 'Room service, petits déjeuners, banquets'],
                        ['icon' => 'Users', 'label' => 'Traiteurs', 'sub' => 'Événementiel, réceptions privées et corporate'],
                        ['icon' => 'Building2', 'label' => 'Cuisines centrales', 'sub' => 'Liaison froide et liaison chaude'],
                        ['icon' => 'GraduationCap', 'label' => 'Cantines', 'sub' => 'Scolaires, crèches, universités'],
                        ['icon' => 'HeartPulse', 'label' => 'Restauration collective', 'sub' => 'Hôpitaux, cliniques, EHPAD, entreprises'],
                    ],
                    'resourcesIntro' => [
                        'eyebrow' => 'Ressources',
                        'title' => 'Tout ce dont vous avez besoin',
                        'lead' => 'Accédez directement à nos ressources pratiques et gammes de produits.',
                    ],
                    'resources' => [
                        ['title' => 'Vos besoins', 'desc' => "Découvrez l'ensemble des équipements et consommables adaptés à votre volume de couverts.", 'button' => 'Découvrir', 'href' => '/besoins'],
                        ['title' => 'Comment procéder', 'desc' => 'Maîtrisez le protocole officiel étape par étape pour sécuriser chaque repas servi.', 'button' => 'Voir le protocole', 'href' => '/comment-proceder'],
                        ['title' => 'Réglementation', 'desc' => 'Tout ce que dit la loi : arrêtés ministériels, durées de garde et sanctions encourues.', 'button' => 'Consulter', 'href' => '/reglementation'],
                    ],
                    'extrasIntro' => [
                        'eyebrow' => 'En plus',
                        'title' => 'Allez plus loin dans la maîtrise de votre hygiène',
                        'lead' => '',
                    ],
                    'extras' => [
                        ['icon' => 'BarChart3', 'title' => 'Traçabilité digitale', 'desc' => 'Archivage cloud et rappels automatisés.'],
                        ['icon' => 'Heart', 'title' => 'Accompagnement hygiène', 'desc' => 'Audit in situ et validation de votre PMS (Plan de Maîtrise Sanitaire).'],
                        ['icon' => 'Lightbulb', 'title' => 'Formation CHR - HACCP & BPH', 'desc' => 'Modules pratiques pour vos chefs et commis de cuisine.'],
                    ],
                ],
            ],

            'besoins' => [
                'title' => 'Vos besoins',
                'description' => 'Équipements et consommables plats témoins adaptés à votre volume de couverts.',
                'content' => [
                    'hero' => [
                        'badge' => 'Équipements & consommables',
                        'title' => 'Vos besoins : équipements & consommables adaptés à vos couverts',
                        'paragraph' => "Découvrez l'ensemble des équipements et consommables adaptés à votre volume de couverts, du petit restaurant indépendant à la cuisine centrale.",
                    ],
                    'categoriesIntro' => [
                        'eyebrow' => 'Notre gamme',
                        'title' => 'Consommables & kits plats témoins',
                        'lead' => 'Chaque gamme est pensée pour répondre aux exigences HACCP et ISO 22000 : prélèvement, identification, conservation et traçabilité.',
                    ],
                    'categories' => [
                        [
                            'icon' => 'Box',
                            'title' => 'Boîtes hermétiques',
                            'desc' => 'Boîtes étanches transparentes sans bisphénol A, compatibles froid positif, en plusieurs formats.',
                            'items' => ['Format 250 ml', 'Format 500 ml', 'Format 1000 ml', 'Couvercles verrouillables'],
                        ],
                        [
                            'icon' => 'Package',
                            'title' => 'Sachets stériles',
                            'desc' => 'Sachets zip et sachets soudables à usage unique pour le prélèvement des portions témoins.',
                            'items' => ['Sachets zip microdotés', 'Sachets soudables thermiques', 'Rouleaux longueur standard', 'Kits mise en route'],
                        ],
                        [
                            'icon' => 'Printer',
                            'title' => 'Étiquetage & traçabilité',
                            'desc' => 'Étiquettes pré-imprimées, rouleaux pour imprimante thermique et registres de traçabilité.',
                            'items' => ['Étiquettes qualité alimentaire', 'Rouleaux thermiques 57x40', 'Blocs de registre papier', 'Carnets de pointage'],
                        ],
                        [
                            'icon' => 'ShoppingBag',
                            'title' => 'Portoirs & stockage',
                            'desc' => 'Portoirs dédiés et bacs de contention pour organiser le stockage en enceinte réfrigérée.',
                            'items' => ['Portoirs inox empilables', 'Bacs de contention étiquetés', 'Clés de contrôle température', 'Supports muraux'],
                        ],
                    ],
                    'quantitiesIntro' => [
                        'eyebrow' => 'Budgéter simplement',
                        'title' => 'Des kits progressifs selon votre volume',
                        'lead' => "Du prélèvement quotidien aux banquets d'ampleur, nos kits sont dimensionnés par nombre de couverts servis.",
                    ],
                    'quantities' => [
                        ['label' => 'Petit volume', 'sub' => 'Jusqu à 100 couverts / jour', 'hint' => '2 à 4 plats témoins'],
                        ['label' => 'Volume moyen', 'sub' => '100 à 500 couverts / jour', 'hint' => '4 à 10 plats témoins'],
                        ['label' => 'Gros volume', 'sub' => 'Plus de 500 couverts / jour', 'hint' => '10+ plats témoins / lots'],
                    ],
                    'cta' => [
                        'label' => 'Demander un devis consommables',
                        'href' => '/contact',
                    ],
                ],
            ],

            'comment-proceder' => [
                'title' => 'Comment procéder',
                'description' => 'Le guide complet du repas témoin : protocole HACCP pas à pas.',
                'content' => [
                    'hero' => [
                        'badge' => 'Protocole HACCP',
                        'title' => 'Comment procéder : le guide complet du repas témoin',
                        'paragraph' => 'Protocole officiel, gestes barrières, durée et température : suivez la méthode conforme HACCP pas à pas.',
                    ],
                    'keyFigures' => [
                        ['icon' => 'Scale', 'value' => '80 g à 100 g', 'label' => 'Quantité minimale par plat témoin'],
                        ['icon' => 'CalendarDays', 'value' => '5 à 7 JOURS', 'label' => 'Durée de conservation au froid'],
                        ['icon' => 'Thermometer', 'value' => '0°C à +3°C', 'label' => 'Température de stockage réfrigéré'],
                        ['icon' => 'UtensilsCrossed', 'value' => 'TOUS LES PLATS', 'label' => 'Entrées, plats chauds, desserts et sauces'],
                    ],
                    'stepsIntro' => [
                        'eyebrow' => 'Protocole 6 étapes',
                        'title' => 'Les étapes chronologiques du protocole',
                        'lead' => '',
                    ],
                    'steps' => [
                        [
                            'number' => '01',
                            'title' => 'LE MOMENT DU PRÉLÈVEMENT',
                            'principle' => 'Prélever le plat témoin en toute fin de chaîne de dressage ou juste avant le départ en distribution / service en salle.',
                            'details' => "Ne jamais prélever directement en début de cuisson pour garantir que l'échantillon reflète fidèlement l'état microbien du plat servi au convive.",
                            'goodPractice' => 'Lavage minutieux des mains et port des gants au poste de prélèvement.',
                            'icon' => 'Clock',
                        ],
                        [
                            'number' => '02',
                            'title' => 'LE MATÉRIEL APPROPRIÉ',
                            'principle' => 'Utiliser exclusivement des consommables stériles à usage unique.',
                            'details' => 'Matériel autorisé : sachets plastiques stériles soudables / zippés, boîtes étanches hermétiques transparentes sans bisphénol A.',
                            'goodPractice' => 'Manipulateur ouvrant un sachet stérile avec ustensile désinfecté.',
                            'icon' => 'Package',
                        ],
                        [
                            'number' => '03',
                            'title' => 'QUANTITÉ ET ÉCHANTILLONNAGE',
                            'principle' => 'Prélever au moins 80 à 100 grammes nets (ou 100 ml pour les liquides et sauces).',
                            'details' => "Chaque élément d'un plat composé (viande + sauce + garniture) doit être représenté ou isolé si nécessaire.",
                            'goodPractice' => 'Peser la portion témoin et noter le poids réel prélevé.',
                            'icon' => 'Scale',
                        ],
                        [
                            'number' => '04',
                            'title' => "L'IDENTIFICATION ET L'ÉTIQUETAGE",
                            'principle' => "Mentions obligatoires sur l'étiquette : nom précis du plat ou préparation, date de fabrication et de consommation (service midi / soir), heure de prélèvement, nom ou initiales du préleveur, numéro de lot matière première en cas de produit sensible.",
                            'details' => "L'étiquette lisible garantit une traçabilité complète et exploitable en cas de contrôle sanitaire.",
                            'goodPractice' => "Impression d'étiquette code-barres et collage sur la boîte témoin.",
                            'icon' => 'Tag',
                        ],
                        [
                            'number' => '05',
                            'title' => 'LE STOCKAGE ET LA TEMPÉRATION',
                            'principle' => 'Enceinte réfrigérée dédiée exclusivement aux plats témoins.',
                            'details' => 'Consigne thermique stricte : froid positif constant entre 0°C et +3°C. Ne jamais congeler sauf dérogation explicite spécifiée au PMS.',
                            'goodPractice' => "Contrôle et enregistrement quotidien de la température de l'enceinte.",
                            'icon' => 'Snowflake',
                        ],
                        [
                            'number' => '06',
                            'title' => 'LA GESTION DE LA FIN DE VIE ET DESTRUCTION',
                            'principle' => 'Conservation pendant au minimum 5 jours pleins (7 jours pour cuisines centrales desservant le week-end).',
                            'details' => 'Destruction : élimination en filière biodéchets sans ouverture préalable pour éviter toute contamination croisée.',
                            'goodPractice' => 'Tenue à jour du registre de destruction des plats témoins.',
                            'icon' => 'Trash2',
                        ],
                    ],
                    'faqIntro' => [
                        'eyebrow' => 'Questions fréquentes',
                        'title' => 'FAQ',
                        'lead' => 'Retrouvez les réponses aux interrogations les plus courantes.',
                    ],
                    'faq' => [
                        [
                            'question' => 'Doit-on congeler ou réfrigérer les repas témoins ?',
                            'answer' => 'Réfrigération obligatoire à +3°C maximum en France comme au Maroc selon les guides CHR standard. La congélation est exclue sauf dérogation explicite prévue au PMS (Plan de Maîtrise Sanitaire).',
                        ],
                        [
                            'question' => 'Qui est habilité à réaliser le prélèvement ?',
                            'answer' => "Le prélèvement doit être réalisé par une personne formée aux bonnes pratiques d'hygiène : responsable HACCP, chef de cuisine ou commis désigné. Le port de gants, le lavage des mains et l'utilisation de consommables stériles sont impératifs, et le nom du préleveur doit être inscrit sur l'étiquette.",
                        ],
                        [
                            'question' => 'Que faire en cas de contrôle de la répression des fraudes ou des services vétérinaires (ONSSA) ?',
                            'answer' => 'Présentez votre registre de traçabilité à jour, les plats témoins conservés à la bonne température et vos procédures HACCP. Un prélèvement correctement conservé permet de démontrer votre conformité et de protéger votre responsabilité en cas de TIAC.',
                        ],
                    ],
                ],
            ],

            'reglementation' => [
                'title' => 'Réglementation',
                'description' => 'Textes légaux, arrêtés ministériels, méthode HACCP et contrôles sanitaires.',
                'content' => [
                    'hero' => [
                        'badge' => 'Textes légaux & normes',
                        'title' => 'Réglementation, guides & normes pratiques',
                        'paragraph' => "Textes légaux applicables, arrêtés ministériels, méthode HACCP et contrôles sanitaires officiels au Maroc et à l'international.",
                        'searchPlaceholder' => 'Rechercher un texte de loi, une norme, un terme (ex: Arrêté 1997, ONSSA, TIAC)...',
                    ],
                    'regulationsIntro' => [
                        'eyebrow' => 'Textes de référence',
                        'title' => 'Les textes de référence',
                        'lead' => '',
                    ],
                    'regulations' => [
                        [
                            'tag' => 'Arrêté ministériel',
                            'title' => 'Arrêté du 29 Septembre 1997',
                            'subtitle' => 'France / Référence Collectivités',
                            'description' => "Fixant les conditions d'hygiène applicables dans les établissements de restauration collective. Obligation de conservation d'un échantillon représentatif de chaque plat.",
                            'keywords' => ['Arrêté 1997', 'France', 'Collectivités', 'Restaurants'],
                        ],
                        [
                            'tag' => 'Règlement européen',
                            'title' => 'Paquet Hygiène',
                            'subtitle' => 'Règlements CE 178/2002 & CE 852/2004',
                            'description' => "Traçabilité amont/aval, gestion du risque biologique et mise en place des procédures fondées sur l'HACCP.",
                            'keywords' => ['Paquet Hygiène', 'CE 178/2002', 'CE 852/2004', 'HACCP', 'Traçabilité'],
                        ],
                        [
                            'tag' => 'Loi marocaine',
                            'title' => 'Loi 28-07 relative à la sécurité sanitaire des produits alimentaires',
                            'subtitle' => 'Maroc / ONSSA',
                            'description' => 'Agrément sanitaire, obligations des exploitants du secteur alimentaire et autocontrôles.',
                            'keywords' => ['Loi 28-07', 'Maroc', 'ONSSA', 'Agrément sanitaire'],
                        ],
                        [
                            'tag' => 'Norme internationale',
                            'title' => 'Norme ISO 22000:2018',
                            'subtitle' => 'Système de management de la sécurité des denrées alimentaires (SMSDA)',
                            'description' => 'Système de management de la sécurité des denrées alimentaires (SMSDA) pour maîtriser les dangers et garantir des denrées sûres.',
                            'keywords' => ['ISO 22000', '2018', 'SMSDA', 'Certification'],
                        ],
                        [
                            'tag' => "Protocole d'urgence",
                            'title' => 'Gestion des TIAC',
                            'subtitle' => 'Toxi-Infections Alimentaires Collectives',
                            'description' => "Protocole de mise sous séquestre des plats témoins en cas d'alerte médicale ou hospitalière.",
                            'keywords' => ['TIAC', 'Séquestre', 'Alerte', 'Vétérinaires'],
                        ],
                    ],
                    'tableIntro' => [
                        'eyebrow' => 'Tableau synthétique',
                        'title' => "Obligations sanitaires par type d'établissement",
                        'lead' => '',
                    ],
                    'obligationTable' => [
                        ['type' => 'Restauration Collective', 'obligation' => 'Stricte & Obligatoire', 'plats' => 'Tous menus servis', 'duree' => '5 jours francs', 'temperature' => '0°C à +3°C'],
                        ['type' => 'Cuisines Centrales', 'obligation' => 'Stricte & Documentée', 'plats' => 'Chaque lot expédié', 'duree' => '7 jours', 'temperature' => '0°C à +3°C'],
                        ['type' => 'Traiteurs Réceptions', 'obligation' => 'Fortement recommandée / Requis > 30 couverts', 'plats' => 'Buffets froids & chauds', 'duree' => '5 jours', 'temperature' => '0°C à +3°C'],
                        ['type' => 'Restaurants Traditionnels', 'obligation' => 'Recommandée (PMS)', 'plats' => 'Menus du jour / Plats sensibles', 'duree' => '3 à 5 jours', 'temperature' => '0°C à +3°C'],
                    ],
                    'downloadsIntro' => [
                        'eyebrow' => 'Centre de téléchargement',
                        'title' => 'Fiches pratiques & guides PDF',
                        'lead' => '',
                    ],
                    'downloads' => [
                        ['title' => 'Fiche Mémo Protocole Repas Témoin A4 Plastifiée', 'type' => 'PDF', 'size' => '1.2 Mo', 'href' => '#'],
                        ['title' => 'Modèle de Registre Manuel de Traçabilité des Plats Témoins', 'type' => 'Excel / PDF', 'size' => '850 Ko', 'href' => '#'],
                        ['title' => "Guide ONSSA / HACCP des Bonnes Pratiques d'Hygiène en Restauration", 'type' => 'PDF', 'size' => '2.4 Mo', 'href' => '#'],
                    ],
                ],
            ],

            'solutions' => [
                'title' => 'Solutions',
                'description' => 'Des solutions simples pour la restauration certifiée : équipement, formation, traçabilité.',
                'content' => [
                    'hero' => [
                        'badge' => 'Équipements & logiciels',
                        'title' => 'Des solutions simples pour la restauration certifiée',
                        'paragraph' => 'Un accompagnement complet et du matériel éprouvé pour instaurer un processus fluide et sécurisé pour vos équipes.',
                    ],
                    'offers' => [
                        [
                            'icon' => 'Settings',
                            'title' => 'Équiper',
                            'desc' => 'Consommables stériles, sachets zip, boîtes hermétiques et portoirs dédiés adaptés à vos couverts.',
                            'features' => ['Boîtes sans bisphénol A', 'Sachets stériles à usage unique', 'Portoirs et bacs de contention'],
                        ],
                        [
                            'icon' => 'BookOpen',
                            'title' => 'Guider',
                            'desc' => 'Fiches protocoles, affichages obligatoires pour poste de travail et guides pratiques.',
                            'features' => ['Fiches poste laminées', 'Affiches HACCP', 'Guides opérateurs'],
                        ],
                        [
                            'icon' => 'BarChart3',
                            'title' => 'Tracer',
                            'desc' => 'Logiciels et applications de saisie rapide avec édition automatisée de code-barres.',
                            'features' => ['Saisie rapide tactile', 'Génération code-barres', 'Archivage cloud et rappels'],
                        ],
                        [
                            'icon' => 'Users',
                            'title' => 'Accompagner',
                            'desc' => 'Audit initial, conseil sur-mesure et formation HACCP certifiante de vos équipes.',
                            'features' => ['Audit in situ', 'Conseil PMS', 'Formation certifiante'],
                        ],
                    ],
                    'digitalIntro' => [
                        'eyebrow' => 'Traçabilité digitale',
                        'title' => 'Passez au registre numérique',
                        'lead' => 'Simplifiez la saisie quotidienne et archivez vos preuves de conformité automatiquement.',
                    ],
                    'digital' => [
                        ['icon' => 'QrCode', 'title' => 'Étiquetage automatisé', 'desc' => 'Code-barres et QR codes imprimés en un clic depuis la tablette.'],
                        ['icon' => 'Cloud', 'title' => 'Archivage cloud', 'desc' => 'Conservation des registres numériques et rappels automatisés de destruction.'],
                        ['icon' => 'ShieldCheck', 'title' => 'Conforme HACCP', 'desc' => "Champs guidés reprenant exactement les mentions obligatoires de l'étiquette."],
                        ['icon' => 'GraduationCap', 'title' => 'Formation intégrée', 'desc' => 'Modules pratiques pour vos chefs et commis de cuisine.'],
                    ],
                    'cta' => [
                        'title' => 'Découvrez la solution qui correspond à votre établissement',
                        'paragraph' => 'Audit initial, conseil sur-mesure et formation HACCP certifiante de vos équipes.',
                        'primaryLabel' => 'Nous contacter',
                        'primaryHref' => '/contact',
                        'secondaryLabel' => 'Voir les consommables',
                        'secondaryHref' => '/besoins',
                    ],
                ],
            ],

            'contact' => [
                'title' => 'Nous contacter',
                'description' => 'Contactez-nous pour vos besoins en consommables, formation et accompagnement hygiène.',
                'content' => [
                    'hero' => [
                        'badge' => 'Nous contacter',
                        'title' => 'Un besoin ? Parlons-en.',
                        'paragraph' => 'Consommables, formation, accompagnement en hygiène ou autre demande : présentez-nous votre besoin et notre équipe de professionnels de la restauration vous recontactera.',
                        'visualHint' => 'Conseillère clientèle / auditrice hygiène à votre écoute',
                    ],
                    'formTitle' => 'Envoyez-nous votre demande',
                    'formLead' => 'Quelques informations nous permettront de mieux comprendre votre besoin pour vous apporter la réponse la plus adaptée.',
                    'infoTitle' => 'Nos coordonnées',
                    'contactInfo' => [
                        ['label' => 'Email', 'value' => 'contact@mesplatstemoins.ma', 'href' => 'mailto:contact@mesplatstemoins.ma'],
                        ['label' => 'Téléphone', 'value' => '+212 (0) 6 400 10 200', 'href' => 'tel:+212640010200'],
                        ['label' => 'Localisation', 'value' => 'Marrakech, Maroc — Services et accompagnement disponibles au Maroc.', 'href' => ''],
                        ['label' => 'Horaires', 'value' => 'Lundi - Vendredi, 08h30 - 18h00', 'href' => ''],
                    ],
                    'directTitle' => 'Vous préférez échanger directement ?',
                    'callLabel' => 'Nous appeler',
                    'whatsappLabel' => 'WhatsApp direct',
                ],
            ],
        ];
    }

    /**
     * Default site-wide settings used by the navbar, footer and contact page.
     *
     * @return array<string, mixed>
     */
    public static function settings(): array
    {
        return [
            'contact' => [
                'entity' => 'Cabinet BEROCERT CONSULTING',
                'email' => 'contact@mesplatstemoins.ma',
                'phoneDisplay' => '+212 (0) 6 400 10 200',
                'phoneRaw' => '+212640010200',
                'whatsapp' => '212640010200',
                'address' => 'Marrakech, Maroc',
                'services' => 'Services et accompagnement disponibles au Maroc.',
                'hours' => 'Lundi - Vendredi, 08h30 - 18h00',
            ],
            'footer' => [
                'mission' => "Le site d'information et d'accompagnement de référence pour la gestion des repas témoins auprès des CHR et collectivités selon la méthode HACCP et la norme ISO 22000.",
                'newsletterTitle' => 'Recevez nos actualités réglementaires et nos guides pratiques.',
                'copyright' => '© 2026 Cabinet BEROCERT CONSULTING - Tous droits réservés.',
            ],
            'banner' => [
                'title' => "Besoin d'aide pour mettre en place votre organisation ?",
                'text' => 'Nos experts vous guident dans le choix des outils et consommables adaptés à votre établissement.',
                'cta' => 'Nous contacter',
                'href' => '/contact',
            ],
        ];
    }
}
