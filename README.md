# How to use?
1. clone repository
2. run composer install
3. open localhost (or domain or subdomain)  
4. edit .htaccess ``RewriteBase /glide-php/`` with your current folder (leave ``/`` if in root)
5. access demo images (folders and subfolders must stay inside ``uploads``)
6. inside index.php you can edit presets, and everything....
7. Feel free to pull request if find some vulnerabilitites... 👀 

## Example 1:

http://localhost:8888/glide-php/demo.jpeg?w=600&h=400&fit=crop

## Example 2:

http://localhost:8888/glide-php/demo/1.webp?w=400&h=400&fit=crop

## Example 3:

http://localhost:8888/glide-php/subfolder/demo.jpeg?w=400&h=400&fit=crop