## ORGANIZATION MEMBERSHIP MANAGEMENT SYSTEM

  ## FRONT END(guest page like, home, about, service, event and blog pages etc)
![Alt text](https://github.com/mua1z/Organization_membership_managment_system/blob/ae2d46519dc55e792247276e7a9bbebdedc541cd/screencapture-127-0-0-1-8000-2025-04-20-21_41_56.png)


  ## BACKEND(dashbord page likes, SupAdmin(owner of system), organization Admin, and member dashbord)
![Alt text](https://github.com/mua1z/Organization_membership_managment_system/blob/5a186112d262434e0c32cc389dfd21bebcb6ded3/screencapture-127-0-0-1-8000-home-2025-04-20-21_59_29.png)

## ✅ Functional Requirements – Super Admin Panel

## 📊 1. Dashboard Overview
- Display total number of organizations
- Show active user counts (OrgAdmins + Members)
- Platform-wide financial statistics (total revenue, monthly earnings)
- Recent activity feed across all organizations
- System health metrics (CPU, memory, uptime)
- Access to application logs

## 2. Organization Management
- View all organizations
- Create, edit, delete organizations
- Assign or update OrgAdmin(s)
- Activate/deactivate an organization
- View organization-specific analytics (e.g., active users, events, revenue)

## 3. Admin Management (OrgAdmins)
- List all OrgAdmin accounts
- Create new OrgAdmin manually
- Suspend/reactivate OrgAdmin access
- Reset OrgAdmin passwords
- Impersonate OrgAdmin for support/debugging

## 👥 4. Member Oversight
- View all members across organizations
- Search & filter by organization or status
- Impersonate member for support
- Bulk delete or transfer members between orgs

## 5. System Configuration
- Global settings: theme, timezone, default language, system name
- Email templates for system notifications
- Currency & locale configuration
- API integration settings (e.g., Stripe, SendGrid)
- System logs view (filter by date, type, user)
- Database backup & restore controls

##  💰 6. Payment & Subscription Control
- View all transactions across organizations
- Manage and configure subscription plans (features, pricing, limits)
- Assign subscriptions to organizations
- View invoices per organization
- Issue refunds or manual overrides

## 7. Advanced Reporting
- Prebuilt and custom report builder (e.g., member growth, payments)
- Export reports in CSV, Excel, PDF formats
- Filter and compare by organization, time, plan

 ## ✅ OrganizationAdmin Dashboard Requierment

## 📊 Dashboard Overview
- View Total Members in the organization
- Display Upcoming Events with calendar highlights
- Monthly Income widget showing payment summaries
- Task Status with progress bars
- Reminders for pending approvals, dues, etc.

## 👥 Member Management
- Add new members manually
- Invite members via email
- Remove members
- Edit member profiles
- Reset member passwords
- Bulk Import/Export members (CSV, Excel)
- Assign internal roles (Treasurer, Secretary, etc.)

## 📆 Event Management
- Create, schedule, and manage events
- Set RSVP deadlines
- Send event reminders and follow-up emails
- Track attendance
- View event-specific analytics (check-ins, interest)

### 📝 Blog/Announcements
- Post blogs or internal announcements
- Edit, publish, delete content
- Upload media (images, PDFs)
- Categorize announcements (e.g. Urgent, Update, General)

## 💰 Payment & Subscription
- View and filter member payment history
- Manually add payments (cash, transfer)
- Resend invoices and payment receipts
- Define subscription plans (monthly, yearly tiers)
- Monitor payment status (Paid, Due, Overdue)

## 📋 Custom Workflows
- Define organization-specific tasks or approval steps
- Assign tasks to members
- Set due dates, descriptions, and priority levels
- Create approval processes for:
  - Event approvals
  - Blog publishing
  - Budget allocation

## 📈 Reports & Insights
- View logs of member activity (logins, updates)
- Track event participation statistics
- Filter financial reports by custom date ranges
- Export reports as PDF, CSV, or Excel

      
## Members dashbord Requierment




## Installation
Follow these instructions to set up and run the project locally on your Machine.

## Prerequisites
- Git
- Composer
- PHP
## Installation
1. Clone the repository:
   
   git clone https://github.com/tauseedzaman/hospitalMS.git
   
  cd hospitalMS
  
composer install

cp .env.example .env

php artisan key:generate

php artisan storage:link

php artisan migrate:fresh --seed

php artisan serve

## Admin Credentials
SupperAdmin Email:

supAdmin@gmail.com
Password:
Muaz@2024
If you like My project please leave a star ❤
