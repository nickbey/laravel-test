Here is the laravel test task.

Unfortunately the requirements are not too clear in case of saving form data:
should data be saved as JSON in one JSON file without using sql database, or should it be separated file for every saved data.
So, task is implemented on second way, every form submitted serialized object is stored in separate json file in storage/app.

Also total value is placed over the table, because if table is too long, there will be need to scroll.