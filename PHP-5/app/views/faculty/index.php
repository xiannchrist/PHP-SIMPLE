<section class="panel">
    <?php if (isset($_GET['message']) && $_GET['message'] !== ''): ?>
        <div class="flash"><?php echo htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8'); ?></div>
    <?php endif; ?>

    <?php if ($errors !== []): ?>
        <div class="errors">
            <strong>Please correct the following:</strong>
            <ul>
                <?php foreach ($errors as $message): ?>
                    <li><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <h2><?php echo htmlspecialchars($formTitle, ENT_QUOTES, 'UTF-8'); ?></h2>
    <form method="post" action="index.php?action=<?php echo htmlspecialchars($formAction, ENT_QUOTES, 'UTF-8'); ?><?php echo $editingId !== null ? '&id=' . (int) $editingId : ''; ?>" class="form-grid">
        <label>
            First Name
            <input type="text" name="first_name" value="<?php echo htmlspecialchars((string) ($old['first_name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <label>
            Middle Name
            <input type="text" name="middle_name" value="<?php echo htmlspecialchars((string) ($old['middle_name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <label>
            Last Name
            <input type="text" name="last_name" value="<?php echo htmlspecialchars((string) ($old['last_name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <label>
            Age
            <input type="number" name="age" min="18" max="100" value="<?php echo htmlspecialchars((string) ($old['age'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <label>
            Gender
            <select name="gender" required>
                <option value="">Select gender</option>
                <?php foreach (['Male', 'Female', 'Other'] as $gender): ?>
                    <option value="<?php echo htmlspecialchars($gender, ENT_QUOTES, 'UTF-8'); ?>" <?php echo (($old['gender'] ?? '') === $gender) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($gender, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>
            Position
            <input type="text" name="position" value="<?php echo htmlspecialchars((string) ($old['position'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <label class="full">
            Address
            <textarea name="address" required><?php echo htmlspecialchars((string) ($old['address'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></textarea>
        </label>
        <label>
            Salary
            <input type="number" name="salary" min="0" step="0.01" value="<?php echo htmlspecialchars((string) ($old['salary'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <div class="actions full">
            <button type="submit"><?php echo $editingId === null ? 'Save Faculty' : 'Update Faculty'; ?></button>
            <a class="button-link secondary" href="index.php">Reset Form</a>
        </div>
    </form>
</section>

<section class="panel">
    <h2>Faculty Records</h2>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($records === []): ?>
                    <tr>
                        <td colspan="8">No faculty records found yet.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?php echo (int) $record['id']; ?></td>
                            <td><?php echo htmlspecialchars($record['first_name'] . ' ' . $record['middle_name'] . ' ' . $record['last_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo (int) $record['age']; ?></td>
                            <td><?php echo htmlspecialchars($record['gender'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($record['address'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($record['position'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo number_format((float) $record['salary'], 2); ?></td>
                            <td class="actions-cell">
                                <a class="button-link" href="index.php?action=edit&id=<?php echo (int) $record['id']; ?>">Edit</a>
                                <form method="post" action="index.php?action=delete&id=<?php echo (int) $record['id']; ?>" onsubmit="return confirm('Delete this faculty record?');">
                                    <button type="submit" class="danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
