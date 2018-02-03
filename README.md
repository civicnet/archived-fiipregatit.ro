# fiipregatit.ro
Platforma națională de informare pentru Situații de Urgență

# Installation notes
This application uses Wordpress as a CMS.

Project was set up using Trellis: https://roots.io
Documentation of Trellis is pretty straight-forward. If you have questions open an issue and label it `question` please.


## Getting started
### Notes: ###

- This guide assumes you are using a unix-like based OS and you install the project in a folder called `fiipregatit.ro`
- Some parts described below can be automated via Vagrant provisioning (post-up)
- The development environment is configured to show notices. WordPress core being what it is, you might see some E_NOTICE messages pop up in the admin panel - this is expected *sigh*
- **Some things are subject to change as the project progresses, if you spot any inconsistencies please either open an issue labeled `question`, either send a pull request**

### Prerequisites: ###
- virtualbox (or another vagrant provider): https://www.vagrantup.com/docs/providers/
- Ansible 2.3.0: http://docs.ansible.com/ansible/latest/intro_installation.html

### Setup for backend dev ###
```
$> git clone https://github.com/civictechro/fiipregatit.ro
$> cd fiipregatit.ro/trellis/group_vars/development/
$> cp vault.yml.dist vault.yml
$> vim vault.yml // feel free to change the default admin password
$> cd ../../../../ // go back to the trellis directory
$> vagrant up
```

Now you should be able to access the dev environment in the browser at `http://dev.fiipregatit.ro`. You'll be welcomed by a default Wordpress installation, so we need to config the environment.

### Configuration ###

Open `http://dev.fiipregatit.ro/admin`. Use the admin password you just set in `vault.yml` to login, with the username `admin`.

Once logged in, it's time to config a few things in the admin panel:

- Go to `Appearance->Themes` and enable **fiipregătit.ro**, our custom theme
- Navigate to `Plugins->Installed Plugins` and enable `Advanced Custom Fields`
- Now that we have custom fields enabled, we need to import our data structures. Go to `Custom Fields->Tools`, and upload `fiipregatit.ro/site/config/misc/acf-export-yyyy-mm-dd.json` using the `Import Field Groups` panel.
- The navigation is not enabled by default. To add the main navigation go to `Appearance->Customize->Menus->Main Navigation` and create the menu. Make sure you check the `Main Navigation` menu location here. Publish when you're done.
- Lastly, it's time to import some scaffolding data. Navigate to `Tools->Import` and select `Run Importer` for the WordPress option (last one). Now import  `fiipregatit.ro/site/config/misc/fiipregtitro.wordpress.yyyy-mm-dd.xml`

### Known issues ###
- The `Export/Import` flow for the data scaffolding is less than ideal since it doesn't take into account the media library so the guides and campaigns are broken and will not display properly. See #46
- The import flow will throw a lot of E_NOTICEs *sigh*
- Some of the steps described here could probably be automated: #48


## Setup for frontend dev ##
### Prerequisites ###

You will need `Node.js` >= 4.5.0 and the latest version of `npm`. Additionally, you will need `gulp` and `bower`.

### Install ###
```
$> cd fiipregatit.ro/site/web/app/themes/sage
$> npm install
$> bower install
$> gulp watch // to compile assets and live reload on changes
```

- To edit templates: `fiipregatit.ro/site/web/app/themes/sage/templates`
- To edit CSS/JS: `fiipregatit.ro/site/web/app/themes/sage/assests/`
- Documentation: https://roots.io/sage/docs/theme-development-and-building/

## A note on credentials ##
Please note `{development,production,staging}/vault.yml` are added to `.gitignore`.

To add your credentials simply copy the `vault.yml.dist` to `vault.yml` and change your credentials accordingly.

**Please change the vault.yml.dist files if you make changes to vault configurations.**

## More documentation ##
Frontend work: https://roots.io/sage/docs/theme-development-and-building/
Backend work: https://roots.io/trellis/docs/local-development-setup/
