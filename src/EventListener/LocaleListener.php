<?php
namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;

/**
 * LocaleListener - Set locale from browser language settings
 */
class LocaleListener
{

    const LANGUAGE_TO_LOCALES = ['en'=>'en', 'en_ie'=>'en-ie', 'de'=>'de-de'];

    const DEFAULT_LOCALE = 'en';

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            // don't do anything if it's not the main request
            return;
        }
        $request = $event->getRequest();
        $preferredLanguage = strtolower($request->getPreferredLanguage());
        if (isset(self::LANGUAGE_TO_LOCALES[$preferredLanguage])) {
            $locale = self::LANGUAGE_TO_LOCALES[$preferredLanguage];
        } else {
            $locale = self::DEFAULT_LOCALE;
        }
        $request->setLocale($locale);
    }
}