<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\TranslationBundle\Model\Gedmo;

use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation as GedmoAbstractPersonalTranslation;

/**
 * @author Nicolas Bastien <nbastien.pro@gmail.com>
 *
 * @see https://github.com/l3pp4rd/DoctrineExtensions/blob/master/doc/translatable.md : Personal translations
 */
class AbstractPersonalTranslation extends GedmoAbstractPersonalTranslation
{
    /**
     * NEXT_MAJOR: Remove this __construct.
     * Convenient constructor.
     *
     * @param string $locale
     * @param string $field
     * @param string $value
     */
    public function __construct($locale = null, $field = null, $value = null)
    {
        if (\func_num_args() > 0) {
            @trigger_error(sprintf(
                'Calling "%s" to set "$locale", "$field" or "$value" is deprecated since'
                .' sonata-project/translation-bundle 2.x and will not work in 3.0. You MUST set those parameters'
                 .' in the constructor of the class extending "%s".',
                __METHOD__,
                __CLASS__
            ), \E_USER_DEPRECATED);
        }

        if (null !== $locale) {
            $this->setLocale($locale);
        }

        if (null !== $field) {
            $this->setField($field);
        }

        if (null !== $value) {
            $this->setContent($value);
        }
    }
}
