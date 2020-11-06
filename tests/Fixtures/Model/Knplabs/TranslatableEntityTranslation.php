<?php

namespace Sonata\TranslationBundle\Tests\Fixtures\Model\Knplabs;

use Knp\DoctrineBehaviors\Contract\Entity\TranslationInterface;
use Knp\DoctrineBehaviors\Model;
use Sonata\TranslationBundle\Model\TranslatableInterface;

// @todo Remove check and else part when dropping support for knplabs/doctrine-behaviors < 2.0
if (interface_exists(TranslatableInterface::class)) {
    class TranslatableEntityTranslation implements TranslationInterface
    {
        use Model\Translatable\TranslationTrait;

        /**
         * @psalm-suppress UndefinedTrait
         */
        use Model\Translatable\Translation;

        /**
         * @var string|null
         */
        private $title;

        public function getTitle(): ?string
        {
            return $this->title;
        }

        public function setTitle(string $title): void
        {
            $this->title = $title;
        }
    }
} else {
    class TranslatableEntityTranslation
    {
        /**
         * @psalm-suppress UndefinedTrait
         */
        use Model\Translatable\Translation;

        /**
         * @var string|null
         */
        private $title;

        public function getTitle(): ?string
        {
            return $this->title;
        }

        public function setTitle(string $title): void
        {
            $this->title = $title;
        }
    }
}
