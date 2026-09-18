<?php

namespace App\Support\Site;

class PageSchema
{
    /**
     * Returns a human-readable label, a slug, and a structured sections array for each CMS page.
     *
     * @return array<string, array>
     */
    public static function schemas(): array
    {
        return [
            'accueil' => [
                'label' => 'Accueil',
                'sections' => [
                    [
                        'key' => 'hero',
                        'label' => 'Héros',
                        'type' => 'group',
                        'fields' => [
                            'badge' => ['type' => 'text', 'label' => 'Badge (sur-titre)'],
                            'title' => ['type' => 'text', 'label' => 'Titre principal'],
                            'paragraph' => ['type' => 'textarea', 'label' => 'Paragraphe'],
                            'ctaPrimary' => ['type' => 'text', 'label' => 'Bouton CTA principal (texte)'],
                            'ctaPrimaryHref' => ['type' => 'href', 'label' => 'Lien du CTA principal (URL)'],
                            'ctaSecondary' => ['type' => 'text', 'label' => 'Bouton CTA secondaire (texte)'],
                            'ctaSecondaryHref' => ['type' => 'href', 'label' => 'Lien du CTA secondaire (URL)'],
                        ],
                        'extra' => [
                            'visual' => ['type' => 'array', 'label' => 'Textes de la zone visuelle droite (4)'],
                        ],
                    ],
                    [
                        'key' => 'pillarsIntro',
                        'label' => 'Section « Piliers » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow / sur-titre'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'pillars',
                        'label' => 'Section « Piliers » — Cartes',
                        'type' => 'repeater',
                        'itemLabel' => 'title',
                        'fields' => [
                            'icon' => ['type' => 'icon', 'label' => 'Icône'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'desc' => ['type' => 'textarea', 'label' => 'Description'],
                        ],
                    ],
                    [
                        'key' => 'solutionsIntro',
                        'label' => 'Section « Solutions » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow / sur-titre'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'solutions',
                        'label' => 'Section « Solutions » — Cartes',
                        'type' => 'repeater',
                        'itemLabel' => 'title',
                        'fields' => [
                            'icon' => ['type' => 'icon', 'label' => 'Icône'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'desc' => ['type' => 'textarea', 'label' => 'Description'],
                        ],
                    ],
                    [
                        'key' => 'chrIntro',
                        'label' => 'Section « CHR » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow / sur-titre'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'chrTypes',
                        'label' => 'Section « CHR » — Types',
                        'type' => 'repeater',
                        'itemLabel' => 'label',
                        'fields' => [
                            'icon' => ['type' => 'icon', 'label' => 'Icône'],
                            'label' => ['type' => 'text', 'label' => 'Titre'],
                            'sub' => ['type' => 'textarea', 'label' => 'Description courte'],
                        ],
                    ],
                    [
                        'key' => 'resourcesIntro',
                        'label' => 'Section « Ressources » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow / sur-titre'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'resources',
                        'label' => 'Section « Ressources » — Cartes',
                        'type' => 'repeater',
                        'itemLabel' => 'title',
                        'fields' => [
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'desc' => ['type' => 'textarea', 'label' => 'Description'],
                            'button' => ['type' => 'text', 'label' => 'Texte du bouton'],
                            'href' => ['type' => 'href', 'label' => 'Lien (URL)'],
                        ],
                    ],
                    [
                        'key' => 'extrasIntro',
                        'label' => 'Section « Extras » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow / sur-titre'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'extras',
                        'label' => 'Section « Extras » — Cartes',
                        'type' => 'repeater',
                        'itemLabel' => 'title',
                        'fields' => [
                            'icon' => ['type' => 'icon', 'label' => 'Icône'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'desc' => ['type' => 'textarea', 'label' => 'Description'],
                        ],
                    ],
                ],
            ],

            'besoins' => [
                'label' => 'Vos besoins',
                'sections' => [
                    [
                        'key' => 'hero',
                        'label' => 'Héros',
                        'type' => 'group',
                        'fields' => [
                            'badge' => ['type' => 'text', 'label' => 'Badge'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'paragraph' => ['type' => 'textarea', 'label' => 'Paragraphe'],
                        ],
                    ],
                    [
                        'key' => 'categoriesIntro',
                        'label' => 'Section « Catégories » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'categories',
                        'label' => 'Section « Catégories » — Cartes',
                        'type' => 'repeater',
                        'itemLabel' => 'title',
                        'fields' => [
                            'icon' => ['type' => 'icon', 'label' => 'Icône'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'desc' => ['type' => 'textarea', 'label' => 'Description'],
                        ],
                        'extra' => [
                            'items' => ['type' => 'array', 'label' => 'Éléments de la liste (puces)'],
                        ],
                    ],
                    [
                        'key' => 'quantitiesIntro',
                        'label' => 'Section « Kits » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'quantities',
                        'label' => 'Section « Kits » — Cartes',
                        'type' => 'repeater',
                        'itemLabel' => 'label',
                        'fields' => [
                            'label' => ['type' => 'text', 'label' => 'Titre'],
                            'sub' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                            'hint' => ['type' => 'text', 'label' => 'Badge indicatif'],
                        ],
                    ],
                    [
                        'key' => 'cta',
                        'label' => 'Appel à l\'action',
                        'type' => 'group',
                        'fields' => [
                            'label' => ['type' => 'text', 'label' => 'Texte du bouton'],
                            'href' => ['type' => 'href', 'label' => 'Lien du bouton'],
                        ],
                    ],
                ],
            ],

            'comment-proceder' => [
                'label' => 'Comment procéder',
                'sections' => [
                    [
                        'key' => 'hero',
                        'label' => 'Héros',
                        'type' => 'group',
                        'fields' => [
                            'badge' => ['type' => 'text', 'label' => 'Badge'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'paragraph' => ['type' => 'textarea', 'label' => 'Paragraphe'],
                        ],
                    ],
                    [
                        'key' => 'keyFigures',
                        'label' => 'Chiffres clés',
                        'type' => 'repeater',
                        'itemLabel' => 'label',
                        'fields' => [
                            'icon' => ['type' => 'icon', 'label' => 'Icône'],
                            'value' => ['type' => 'text', 'label' => 'Valeur (chiffre)'],
                            'label' => ['type' => 'text', 'label' => 'Libellé'],
                        ],
                    ],
                    [
                        'key' => 'stepsIntro',
                        'label' => 'Section « Étapes » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'steps',
                        'label' => 'Étapes du protocole',
                        'type' => 'repeater',
                        'itemLabel' => 'title',
                        'fields' => [
                            'number' => ['type' => 'text', 'label' => 'Numéro (01-06)'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'principle' => ['type' => 'textarea', 'label' => 'Principe'],
                            'details' => ['type' => 'textarea', 'label' => 'Détails'],
                            'goodPractice' => ['type' => 'textarea', 'label' => 'Bonne pratique'],
                            'icon' => ['type' => 'icon', 'label' => 'Icône'],
                        ],
                    ],
                    [
                        'key' => 'faqIntro',
                        'label' => 'Section FAQ — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'faq',
                        'label' => 'Questions fréquentes',
                        'type' => 'repeater',
                        'itemLabel' => 'question',
                        'fields' => [
                            'question' => ['type' => 'text', 'label' => 'Question'],
                            'answer' => ['type' => 'textarea', 'label' => 'Réponse'],
                        ],
                    ],
                ],
            ],

            'reglementation' => [
                'label' => 'Réglementation',
                'sections' => [
                    [
                        'key' => 'hero',
                        'label' => 'Héros',
                        'type' => 'group',
                        'fields' => [
                            'badge' => ['type' => 'text', 'label' => 'Badge'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'paragraph' => ['type' => 'textarea', 'label' => 'Paragraphe'],
                            'searchPlaceholder' => ['type' => 'text', 'label' => 'Placeholder du champ recherche'],
                        ],
                    ],
                    [
                        'key' => 'regulationsIntro',
                        'label' => 'Section « Textes » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'regulations',
                        'label' => 'Textes de référence',
                        'type' => 'repeater',
                        'itemLabel' => 'title',
                        'fields' => [
                            'tag' => ['type' => 'text', 'label' => 'Badge du tag'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'subtitle' => ['type' => 'text', 'label' => 'Sous-titre'],
                            'description' => ['type' => 'textarea', 'label' => 'Description'],
                        ],
                        'extra' => [
                            'keywords' => ['type' => 'array', 'label' => 'Mots-clés (recherche)'],
                        ],
                    ],
                    [
                        'key' => 'tableIntro',
                        'label' => 'Section « Tableau » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'obligationTable',
                        'label' => 'Tableau des obligations',
                        'type' => 'repeater',
                        'itemLabel' => 'type',
                        'fields' => [
                            'type' => ['type' => 'text', 'label' => 'Type d\'établissement'],
                            'obligation' => ['type' => 'text', 'label' => 'Obligation légale'],
                            'plats' => ['type' => 'text', 'label' => 'Plats concernés'],
                            'duree' => ['type' => 'text', 'label' => 'Durée minimale'],
                            'temperature' => ['type' => 'text', 'label' => 'Température'],
                        ],
                    ],
                    [
                        'key' => 'downloadsIntro',
                        'label' => 'Section « Téléchargements » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'downloads',
                        'label' => 'Fiches & guides',
                        'type' => 'repeater',
                        'itemLabel' => 'title',
                        'fields' => [
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'type' => ['type' => 'text', 'label' => 'Type (PDF, Excel…)'],
                            'size' => ['type' => 'text', 'label' => 'Taille'],
                            'href' => ['type' => 'href', 'label' => 'Lien de téléchargement'],
                        ],
                    ],
                ],
            ],

            'solutions' => [
                'label' => 'Solutions',
                'sections' => [
                    [
                        'key' => 'hero',
                        'label' => 'Héros',
                        'type' => 'group',
                        'fields' => [
                            'badge' => ['type' => 'text', 'label' => 'Badge'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'paragraph' => ['type' => 'textarea', 'label' => 'Paragraphe'],
                        ],
                    ],
                    [
                        'key' => 'offers',
                        'label' => 'Offres',
                        'type' => 'repeater',
                        'itemLabel' => 'title',
                        'fields' => [
                            'icon' => ['type' => 'icon', 'label' => 'Icône'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'desc' => ['type' => 'textarea', 'label' => 'Description'],
                        ],
                        'extra' => [
                            'features' => ['type' => 'array', 'label' => 'Liste des fonctionnalités'],
                        ],
                    ],
                    [
                        'key' => 'digitalIntro',
                        'label' => 'Section « Traçabilité » — Intro',
                        'type' => 'group',
                        'fields' => [
                            'eyebrow' => ['type' => 'text', 'label' => 'Eyebrow'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'lead' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                        ],
                    ],
                    [
                        'key' => 'digital',
                        'label' => 'Traçabilité digitale — Cartes',
                        'type' => 'repeater',
                        'itemLabel' => 'title',
                        'fields' => [
                            'icon' => ['type' => 'icon', 'label' => 'Icône'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'desc' => ['type' => 'textarea', 'label' => 'Description'],
                        ],
                    ],
                    [
                        'key' => 'cta',
                        'label' => 'Appel à l\'action final',
                        'type' => 'group',
                        'fields' => [
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'paragraph' => ['type' => 'textarea', 'label' => 'Sous-titre'],
                            'primaryLabel' => ['type' => 'text', 'label' => 'Bouton principal (texte)'],
                            'primaryHref' => ['type' => 'href', 'label' => 'Lien bouton principal'],
                            'secondaryLabel' => ['type' => 'text', 'label' => 'Bouton secondaire (texte)'],
                            'secondaryHref' => ['type' => 'href', 'label' => 'Lien bouton secondaire'],
                        ],
                    ],
                ],
            ],

            'contact' => [
                'label' => 'Contact',
                'sections' => [
                    [
                        'key' => 'hero',
                        'label' => 'Héros',
                        'type' => 'group',
                        'fields' => [
                            'badge' => ['type' => 'text', 'label' => 'Badge'],
                            'title' => ['type' => 'text', 'label' => 'Titre'],
                            'paragraph' => ['type' => 'textarea', 'label' => 'Paragraphe'],
                            'visualHint' => ['type' => 'text', 'label' => 'Texte zone visuelle droite'],
                        ],
                    ],
                    [
                        'key' => 'texts',
                        'label' => 'Textes de la page',
                        'type' => 'group',
                        'flatten' => true,
                        'fields' => [
                            'formTitle' => ['type' => 'text', 'label' => 'Titre du formulaire'],
                            'formLead' => ['type' => 'textarea', 'label' => 'Sous-titre du formulaire'],
                            'infoTitle' => ['type' => 'text', 'label' => 'Titre des coordonnées'],
                            'directTitle' => ['type' => 'text', 'label' => 'Titre « échange direct »'],
                            'callLabel' => ['type' => 'text', 'label' => 'Libellé bouton appel'],
                            'whatsappLabel' => ['type' => 'text', 'label' => 'Libellé bouton WhatsApp'],
                        ],
                    ],
                    [
                        'key' => 'contactInfo',
                        'label' => 'Coordonnées',
                        'type' => 'repeater',
                        'itemLabel' => 'label',
                        'fields' => [
                            'label' => ['type' => 'text', 'label' => 'Libellé (Email, Téléphone…)'],
                            'value' => ['type' => 'text', 'label' => 'Valeur affichée'],
                            'href' => ['type' => 'href', 'label' => 'Lien (mailto:, tel:… ou laisser vide)'],
                        ],
                    ],
                ],
            ],
        ];
    }
}
