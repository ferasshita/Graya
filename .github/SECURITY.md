# Security Policy

## Supported Versions

The following versions of Graya currently receive security updates:

| Version | Supported          |
| ------- | ------------------ |
| 3.x     | ✅ Yes             |
| < 3.0   | ❌ No              |

## Reporting a Vulnerability

We take security seriously. If you discover a security vulnerability in Graya, **please do not open a public issue**. Disclosing security issues publicly before they are resolved could put users at risk.

### How to Report

Please report vulnerabilities by emailing us directly at:

📧 **[shitaferas195@gmail.com](mailto:shitaferas195@gmail.com)**

Include the following information in your report:

- A clear description of the vulnerability
- Steps to reproduce the issue
- The potential impact or attack scenario
- Any suggested fixes or mitigations (optional)

### What to Expect

- **Acknowledgement**: You will receive an acknowledgement within **48 hours** of your report.
- **Status updates**: We will keep you informed of the progress toward a fix.
- **Resolution**: We aim to resolve critical vulnerabilities within **7 days** and less severe issues within **30 days**.
- **Credit**: With your permission, we will credit you in the release notes when the fix is published.

## Security Best Practices for Deployment

When deploying Graya in a production environment, please follow these recommendations:

- Set `APP_ENV=production` and `APP_DEBUG=false` in your `.env` file.
- Generate a strong, unique `APP_KEY` using `php artisan key:generate`.
- Use HTTPS and configure proper SSL certificates.
- Restrict database user permissions to only what the application requires.
- Keep PHP, Composer, and all dependencies up to date.
- Regularly review Laravel's [security documentation](https://laravel.com/docs/security).
- Do not expose the `.env` file or `storage/` directory through your web server.

## Scope

This policy applies to the Graya source code hosted at [https://github.com/ferasshita/Graya](https://github.com/ferasshita/Graya). It does not cover third-party packages or services used by Graya.
