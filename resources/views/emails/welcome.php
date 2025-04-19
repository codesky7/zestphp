<!DOCTYPE html>
<html>
<head>
    <title>Welcome to <?php echo htmlspecialchars($name); ?></title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #007bff; color: white; padding: 10px; text-align: center; }
        .content { padding: 20px; background: #f9f9f9; }
        .footer { text-align: center; font-size: 12px; color: #777; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome, <?php echo htmlspecialchars($name); ?>!</h1>
        </div>
        <div class="content">
            <p>Thank you for joining <?php echo htmlspecialchars('akash'); ?>.</p>
            <p>We're excited to have you on board. Explore our features and start building amazing applications!</p>
        </div>
        <div class="footer">
            <p>© <?php echo date('Y'); ?> <?php echo htmlspecialchars('akash'); ?>. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
