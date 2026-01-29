| 資料表名稱 (Table Name) | 中文說明 | 關鍵欄位設計思路 |
| :--- | :--- | :--- |
| venues | 場館 | id, name, code (場館代碼), location |
| activities | 活動/導覽 | id, venue_id (FK), title, description, is_active |
| activity_sessions | 場次 (Time Slots) | id, activity_id (FK), start_time, end_time, quota_total, quota_vip |

php artisan migrate --path=database/migrations/2026_01_10_200832_create_venues_table.php

| 資料表名稱 (Table Name) | 中文說明 | 關鍵欄位設計思路 |
| :--- | :--- | :--- |
| bookings | 預約訂單 | booking_no (預約編號), session_id, status, customer_info (JSON), type (General/VIP) |
| booking_locks | 名額鎖定 (暫存) | token, session_id, locked_qty, expires_at |
| booking_attendees | 參訪民眾明細 | booking_id, name, identity_hash (若需實名制) |
