
## Description

ExpressionEngine plugin which encrypts a string using a custom salt key.

### Installation

Copy the "salt_shaker" folder to your /system/expressionengine/third_party folder.

### Usage

Use {exp:salt_shaker salt='random_salt_key'}content you want salted{/exp:salt_shaker} to output salted contents.

The salt can be anything, however I recommend grabbing a random alphanumeric from https://www.grc.com/passwords.htm for best results.

#### Examples

```
{exp:salt_shaker salt='T8asKa2PJOTwVCbvjEoZkPGANea2JQUouWh2wLh3tf0DglUOJCyOGBgBfaB1TTb'}teststring{/exp:salt_shaker}
```

This would return:

```
f56c623464c7a221b20dabd1d4b3faa9
```

### Practical Uses

The sky's the limit in terms of application. I initially put this together to generate unique license keys based on member usernames for a project I'm working on.

For super basic DRM, the client would send the username and license key, and serverside I'd match it against:

```
{exp:salt_shaker salt='random_salt_key'}{username}{/exp:salt_shaker}
```

In this situation, the salt would never be exposed to the client, and since EE usernames are unique, the resulting license key would also be unique.