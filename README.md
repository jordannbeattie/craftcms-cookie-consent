# Cookie Consent

## Requirements
The project must be using AlpineJS, TailwindCSS and CraftCMS. 

## Installation
Add the following to your `tailwind.config.js`
```
content: [
        ...
        './vendor/jordanbeattie/craftcms-gtm-consent/**/*.twig'
    ],
```

## Customisation
### Style
You can use the following IDs to target individual elements in the popup
- `CookieConsent`
- `CookieConsent__Wrapper`
- `CookieConsent__DefaultContent`
- `CookieConsent__Headline`
- `CookieConsent__Copy`
- `CookieConsent__Buttons`
- `CookieConsent__AcceptButtons`
- `CookieConsent__AcceptButton`
- `CookieConsent__NecessaryOnlyButton`
- `CookieConsent__Moreutton`
- `CookieConsent__DetailContent`
- `CookieConsent__Options`
- `CookieConsent__Necessary`
- `CookieConsent__Analytics`
- `CookieConsent__Advertisement`
- `CookieConsent__PolicyLink`
- `CookieConsent__DetailButtons`
- `CookieConsent__SubmitButton`
- `CookieConsent__LessButton`

### Content
Create a `gtm-consent.php` file in your projects `config` directory and copy the content from this plugin's config file. You can then modify the values of the properties to update the content shown on the popup. To hide the content, simply set the value to null.