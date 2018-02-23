# Morning Workout w07d04

### 1. PHP project

Create php project with markup based on template.html.

### 2. Prepare DB

Create database, import SQL file.

### 3. Render messages.

Render all messages {name, message, created_at} from table `messages` into *div#disc_messages* in template.

Use following template for each of the messages:

```
<div class="disc-message">
    <div class="disc-header">name</div>
    <div class="disc-body">message</div>
    <div class="disc-footer">created_at</div>
</div>
```

### 4. No messages warning

In case of empty table `messages` render warning: "No messages yet :(".

### 5. Make form working!
