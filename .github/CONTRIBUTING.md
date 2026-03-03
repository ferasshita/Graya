# Contributing to Graya

Thank you for your interest in contributing to Graya! We welcome all kinds of contributions — bug reports, feature requests, documentation improvements, and code changes.

Please take a moment to read through this guide before getting started.

## Table of Contents

- [Code of Conduct](#code-of-conduct)
- [Getting Started](#getting-started)
- [How to Contribute](#how-to-contribute)
  - [Reporting Bugs](#reporting-bugs)
  - [Suggesting Features](#suggesting-features)
  - [Submitting Code Changes](#submitting-code-changes)
- [Development Setup](#development-setup)
- [Coding Standards](#coding-standards)
- [Commit Messages](#commit-messages)
- [Pull Request Process](#pull-request-process)

## Code of Conduct

By participating in this project, you agree to abide by our [Code of Conduct](CODE_OF_CONDUCT.md). Please read it before contributing.

## Getting Started

1. **Fork** the repository on GitHub.
2. **Clone** your fork locally:
   ```bash
   git clone https://github.com/your-username/Graya.git
   cd Graya
   ```
3. **Set up** the project following the [installation instructions](../INSTALLATION.md) at the repository root.
4. **Create a branch** for your changes:
   ```bash
   git checkout -b feature/your-feature-name
   ```

## How to Contribute

### Reporting Bugs

If you find a bug, please open an issue using the **Bug Report** template. Include:

- A clear and descriptive title
- Steps to reproduce the issue
- Expected vs. actual behavior
- Screenshots or error messages if applicable
- Your environment (PHP version, Laravel version, OS, browser)

### Suggesting Features

Have an idea for a new feature? Open an issue using the **Feature Request** template and describe:

- The problem you are trying to solve
- Your proposed solution
- Any alternatives you have considered

### Submitting Code Changes

1. Ensure there is an open issue related to your change, or open one first to discuss it.
2. Follow the [Development Setup](#development-setup) instructions.
3. Make your changes in a dedicated branch.
4. Write or update tests as needed.
5. Run the test suite to confirm nothing is broken.
6. Submit a pull request using the pull request template.

## Development Setup

**Requirements:**
- PHP 8.2+
- Composer
- MySQL / MariaDB
- Node.js & NPM (optional, for frontend assets)

**Steps:**

```bash
# Install PHP dependencies
composer install

# Copy environment file and generate application key
cp .env.example .env
php artisan key:generate

# Configure your database in .env, then run migrations and seeders
php artisan migrate --seed

# Create the storage symlink
php artisan storage:link

# Start the development server
php artisan serve
```

## Coding Standards

- Follow the [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standard for PHP.
- Follow Laravel conventions for controllers, models, migrations, and routes.
- Keep methods short and focused on a single responsibility.
- Avoid committing debug code, `dd()`, `var_dump()`, or commented-out code blocks.
- Use meaningful variable and method names.

## Commit Messages

- Use the present tense: `Add feature` not `Added feature`.
- Use the imperative mood: `Fix bug` not `Fixes bug`.
- Keep the subject line under 72 characters.
- Reference related issues with `Fixes #issue-number` or `Closes #issue-number`.

**Examples:**
```
Add quiz timer feature to student dashboard
Fix enrollment check for free courses
Update README with seeder instructions
```

## Pull Request Process

1. Ensure your branch is up to date with `main` before submitting.
2. Fill in the pull request template completely.
3. Link the related issue in your pull request description.
4. Wait for a code review. Address any feedback promptly.
5. Once approved, a maintainer will merge your pull request.

We appreciate every contribution, no matter how small. Thank you for helping make Graya better!
