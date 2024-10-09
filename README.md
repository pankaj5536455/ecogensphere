
# EcoGenSphere

**EcoGenSphere** is a comprehensive digital platform aimed at empowering gardeners, farmers, and horticulturists to effectively manage their gardening activities. It focuses on promoting sustainable agricultural practices by integrating modern technology to streamline various processes, including garden planning, plant management, soil monitoring, and pest control.

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Acknowledgements](#acknowledgements)

## Introduction
EcoGenSphere is designed for both home gardeners and commercial growers, offering tools for effective garden management and decision-making through automation and real-time monitoring. The system integrates data-driven insights to optimize plant growth, soil conditions, and resource allocation.

### Objectives
- Automate and streamline gardening tasks.
- Provide tools for efficient garden planning and real-time monitoring.
- Support data-driven decision-making to maximize yield and minimize resource usage.
- Enhance collaboration and knowledge sharing among the gardening community.

## Features
- **Garden Planning and Design:** Create virtual layouts of gardens with tools for planning and experimenting with designs.
- **Plant Database:** Access comprehensive information about various plants, including their growth requirements and care techniques.
- **Task Scheduler:** Manage schedules for planting, watering, fertilizing, and more with reminders and notifications.
- **Soil Management:** Monitor soil health, track soil tests, and receive improvement recommendations.
- **Weather Integration:** Adjust gardening activities based on weather forecasts.
- **Pest and Disease Management:** Get guidance on identifying and treating pests and diseases.
- **Resource Management:** Track inventory of gardening supplies and optimize resource use.

## Technology Stack
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP
- **Database:** MySQL
- **Development Tools:** XAMPP, Visual Studio Code, Git
- **Other Tools:** jQuery, AJAX for asynchronous data handling

## Installation
1. Clone the repository:
    ```bash
    git clone https://github.com/pankaj5536455/ecogensphere.git
    ```
2. Install dependencies (ensure XAMPP is installed for local development):
    - Start Apache and MySQL using XAMPP.
    - Place the project files in the `htdocs` directory.

## Database Setup
1. Open MySQL or any database manager (like phpMyAdmin).
2. Create a new database named `ecogensphere`.
3. Import the database schema located in the repository:
    - Navigate to the `database` folder.
    - Locate the `ecogensphere.sql` file.
    - Import the SQL file into your newly created database.

```bash
mysql -u your_username -p your_password ecogensphere < path_to_ecogensphere.sql
```

Alternatively, if using phpMyAdmin:
- Open `phpMyAdmin`.
- Select the `ecogensphere` database.
- Go to the **Import** tab.
- Upload the `ecogensphere.sql` file from the `database` folder in the repository.

4. Configure the `config.php` file with your database credentials:
    ```php
    <?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'your_username');
    define('DB_PASSWORD', 'your_password');
    define('DB_DATABASE', 'ecogensphere');
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    ?>
    ```

5. Run the application by visiting `http://localhost/EcoGenSphere` in your browser.

## Usage
Once installed, you can:
- Create and manage gardens and plant schedules.
- Add new plants from the built-in database or create custom entries.
- View garden layouts, adjust schedules, and track soil conditions.
- Receive notifications and reminders for important gardening tasks.

## Contributing
We welcome contributions to EcoGenSphere! If you'd like to contribute:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a Pull Request.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgements
We would like to thank our project guide, **Mr. Deepak Rathore**, for his invaluable support and guidance throughout the development of EcoGenSphere. Special thanks to **Lingaya's Lalita Devi Institute of Management and Science** for providing the necessary resources and facilities.

---
