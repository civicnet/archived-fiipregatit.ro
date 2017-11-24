# fiipregatit.ro
Platforma națională de informare pentru Situații de Urgență

# Installation notes
This application uses Wordpress as a CMS.

Project was set up using Trellis: https://roots.io
Documentation of Trellis is pretty straight-forward. If you have questions contact the developers.


## Getting started
### Notes: ### 

- This guide assumes you are using a unix-like based OS and you install the project in a folder called `fiipregatit.ro`
- Some parts described below can be automated via Vagrant provisioning (post-up)
- **Some things are subject to change as the project progresses, so some things described below will be deemed irrelevant or useless. Please make sure to update this file to keep it up to date!** 

### Prerequisites: ###
- virtualbox (or another vagrant provider): https://www.vagrantup.com/docs/providers/
- Ansible 2.3.0: http://docs.ansible.com/ansible/latest/intro_installation.html

1. Start vagrant from the `fiipregatit.ro/trellis/` folder

```
vagrant up
```

Now you should be able to access the dev environment in the browser at `http://fiipregatit.dev`

2. Now we need to enable our theme:
- Login in WP-ADMIN @ `http://fiipregatit.dev/admin`; You can find the credentials in 
`fiipregatit.ro/trellis/group_vars/development/vault.yml`
- Go to `appearance->themes` and enable **Sage Starter Theme**

3. We also need to enable some plugins. In WP-ADMIN navigate to **Plugins** screen and enable `Advanced Custom Fields` and `Simple Custom Post Order`

4. Now we need to import some test data. 
- In WP-ADMIN navigate to `Tools->Import`. Scroll all the way down and install `Wordpress` importer. 
- After is done click on `Run Importer`
- On the next screen you'll have to import and XML. Now, you have 2 options:
  - `fiipregatit.ro/site/config/misc/advanced-custom-field-export.xml` includes all the custom fields. **They are mandatory for the website to run properly!**
  - `fiipregatit.ro/site/config/misc/fiipregatitro.wordpress.2017-09-28.xml` includes all the custom fields from the file above plus some dummy data for posts, pages, etc. It's not much but it's something. So you might as well use this one. You decide.

5. Current state of theme is very raw. This means no navigation. Check in WP-ADMIN permalinks of various pages/posts.
6. For Frontend development:
- you can add the markup in the template files in `fiipregatit.ro/site/web/app/themes/sage/templates`
- for CSS/JS stuff you need change assets in `fiipregatit.ro/site/web/app/themes/sage/assests/` and use `gulp`.
- to watch for style changes during development go to the theme folder in CLI `fiipregatit.ro/site/web/app/themes/sage/`
 and run `gulp watch`. Please read official doc page for more info: https://roots.io/sage/docs/theme-development-and-building/
 
 7. The rest is pretty much Wordpress ~~shit~~ stuff. Have fun!

#### *A note on credentials
Please note {development,production,staging}/vault.yml are added to gitignore.
To add your credentials simply copy the vault.yml.dist to vault.yml and change your credentials accordingly.

**Please change the vault.yml.dist files if you make changes to vault configurations.**

# Theme
For now the project only uses a starter theme included in Trellis: Sage.
This will be used as a starting point to develop the frontend.
After you install the project make sure to follow instructions from the link below (since the built assets are 
not in the repo):
https://roots.io/sage/docs/theme-development-and-building/
