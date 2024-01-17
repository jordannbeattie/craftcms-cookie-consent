# Cookie Consent
This plugin will add a popup to the bottom-right of the page informing users that the website uses cookies and allows them to enable/disable advertisement and analytics cookies. 

## Requirements
The project must be using AlpineJS, TailwindCSS and CraftCMS. 

## Installation

Add the below hook to your `<head>` element. 
```
{% hook 'cookie-consent' %}
```

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
The majority of the content within the popup can be customised via a config file. Running the below command will create a `coookie-consent.php` file in your `config` directory which you can customise. 
```
php craft cookie-consent/config
```

## Usage
In your Twig templates, you can use the following function to check whether a user has accepted analytics or advertisement cookies. 
```
craft.cookieConsent.getConsent()
```

