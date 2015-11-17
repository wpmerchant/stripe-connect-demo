PHP Stripe Connect Demo
===============

Stripe Connect allows you to connect to another user's stripe account and make any of Stripe's Api calls on their behalf. According to Stripe, you want to use their Connect functionality "if you’re building a platform or marketplace that needs to pay third-parties or building applications that help Stripe users do more with their account or their data." 

My brother and I started working with Stripe Connect to build out our platform giving users access to Professional WordPress eCommerce Web Sites called WPMerchant. For some of these eCommerce sites, we needed to accept payments on our customers' behalf for products or subscriptions that they are selling.  But, we wanted to make the on-boarding process easier for our users. Stripe Connect provides that simpler user experience; it gives us a way to connect to a user's Stripe account without the hassle of having them separately sign up for Stripe and/or search for their API keys and add them directly to our dashboard.  

With this demo, you use the OAuth2 protocol to connect to a Standalone Stripe account. You can get an authorized Stripe user's live secret and public API keys and a live refresh token. You can use the refresh token to get test secret and public API keys. You can then store these different API keys to make calls to different methods of Stripe's API on behalf of these connected users in their live or test Stripe environments. 

### Instructions
Check out an in depth SitePoint Article on the subject - it'll walk you through the whole setup process.