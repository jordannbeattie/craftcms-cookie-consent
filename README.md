# GTM Consent

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
- `GTMConsent`
- `GTMConsent__Wrapper`
- `GTMConsent__DefaultContent`
- `GTMConsent__Headline`
- `GTMConsent__Copy`
- `GTMConsent__Buttons`
- `GTMConsent__AcceptButtons`
- `GTMConsent__AcceptButton`
- `GTMConsent__NecessaryOnlyButton`
- `GTMConsent__Moreutton`
- `GTMConsent__DetailContent`
- `GTMConsent__Options`
- `GTMConsent__Necessary`
- `GTMConsent__Analytics`
- `GTMConsent__Advertisement`
- `GTMConsent__PolicyLink`
- `GTMConsent__DetailButtons`
- `GTMConsent__SubmitButton`
- `GTMConsent__LessButton`

### Content
Create a `gtm-consent.php` file in your projects `config` directory and copy the content from this plugin's config file. You can then modify the values of the properties to update the content shown on the popup. To hide the content, simply set the value to null.