# Security Policy

## Supported Versions
We provide security updates for the following versions of EcoGenSphere:

| Version | Supported          |
| ------- | ------------------ |
| 1.x     | :white_check_mark:  |
| < 1.0   | :x:                |

Only the latest stable release will receive security updates.

## Reporting a Vulnerability
If you discover a security vulnerability in EcoGenSphere, we encourage you to report it responsibly to help protect users. Please do **not** publicly disclose the vulnerability until we have addressed it.

### How to Report
1. **Email:** Send an email to our security team at `security@ecogensphere.com`.
2. **Information to Include:**
   - A detailed description of the vulnerability.
   - Steps to reproduce the issue.
   - Any possible exploits or examples that demonstrate the issue.
   - Impact and potential severity of the vulnerability.

### Response Time
- **Acknowledgement:** Within 48 hours of receiving the report.
- **Fix Plan:** We will review the report and provide an initial assessment within 5 business days.
- **Security Patch:** If the vulnerability is confirmed, we aim to release a patch within 30 days.

## Security Best Practices
EcoGenSphere follows these security best practices to ensure the safety of our application and users:

### Input Validation
- All user inputs are validated and sanitized to prevent SQL Injection, Cross-Site Scripting (XSS), and other injection attacks.

### Authentication
- Passwords are stored securely using hashing algorithms like `bcrypt`.
- User sessions are protected with session timeouts and proper session management.

### Data Encryption
- All sensitive data transmitted between the client and server is encrypted using HTTPS with SSL certificates.

### Access Control
- We implement role-based access control (RBAC) to limit user permissions and restrict access to sensitive areas of the application.

### Error Handling
- Detailed error messages are logged but not displayed to users to avoid revealing sensitive information.

## Monitoring and Updates
- Regular security audits and updates are performed to ensure any vulnerabilities are addressed in a timely manner.
- We actively monitor dependencies and third-party libraries to apply security patches when necessary.

## Credits
We sincerely thank the individuals and organizations who contribute to the security of EcoGenSphere by responsibly disclosing vulnerabilities.
