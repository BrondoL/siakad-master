siAkad Cloud v2 Backend: Helper Files

Konfigurasi Composer untuk mengakses GitLab Sevima dengan Personal Access Token:

1. Buat Personal Access Token dengan Scopes api di http://gitlab.sevima.com:8888/profile/personal_access_tokens
2. Konfigurasi Composer dengan cara:

composer config --global --auth --editor

Masukkan data berikut pada auth.json yang terbuka:

- "gitlab-domains": ["gitlab.sevima.com:8888"]
- "gitlab-token": {"gitlab.sevima.com:8888": "PERSONAL_ACCESS_TOKEN"}
- "secure-http": false