# Simple Property Search

## Overview

This project demonstrates a basic search functionality with pagination over a given dataset.  
The application allows users to filter and refine search results based on specific criteria.

### Search Features

The search supports:

- Exact and partial matches for **location**.
- Filtering by **proximity to the beach**.
- Filtering for **pet-friendly** properties.
- Minimum number of **sleeps**.
- Minimum number of **beds**.
- **Availability** checking.

### Key Points

- Focused purely on search functionality.
- Results are **paginated**.
- No front-end web design; functionality over appearance.
- Built following **Object-Oriented Programming (OOP)** principles.

## Installation

This project was built using **Laravel 8**.  
To set it up locally (example: macOS using Laravel Valet):

1. Open Terminal.
2. Navigate to the project folder.
3. Run `composer install`.
4. Import the provided `properties.sql` file into your MySQL database.
5. Update your `.env` file with your local database credentials.
6. Access the project in your browser via your Valet domain (e.g., `http://property-search.test`).

## Testing

- Unit tests are located in `tests/Feature/PropertySearchTest.php`.
- To run the tests, use:

  ```bash
  php artisan test
  ```
