# Media Collaborate

## Overview

A Laravel application with role-based panels for public users, video creators, and editors. The application features multimedia uploads, content management, and comprehensive admin control over all functionalities.

## Git Commands

### Push Changes

To push your local changes to the remote repository, follow these steps:

1. **Initialize Git Repository** (if not already initialized):
    ```bash
    git init
    ```

2. **Add All Files to Staging Area**:
    ```bash
    git add .
    ```

3. **Commit Your Changes**:
    ```bash
    git commit -m "Commit"
    ```

4. **Set the Default Branch to Main**:
    ```bash
    git branch -M main
    ```

5. **Add Remote Repository** (if not already added):
    ```bash
    git remote add origin https://github.com/shizan117/Media_Collaborate.git
    ```

6. **Force Push to Remote Repository**:
    ```bash
    git push -f origin main
    ```

### Pull Changes

To pull changes from the remote repository, follow these steps:

1. **Fetch Remote Changes**:
    ```bash
    git fetch origin
    ```

2. **Pull Remote Changes** (merge with local changes):
    ```bash
    git pull origin main
    ```

3. **Resolve Conflicts** (if any):
    - Edit the files to resolve conflicts.
    - Add the resolved files to the staging area:
        ```bash
        git add <file1> <file2> ...
        ```
    - Commit the resolved changes:
        ```bash
        git commit -m "Resolved conflicts"
        ```

4. **Push Local Changes** (after resolving any conflicts):
    ```bash
    git push origin main
    ```


**Note:** Use `--rebase` with `git pull` if you need to reapply local commits on top of the remote changes:
```bash
git pull --rebase origin main
"# video_hinda" 
