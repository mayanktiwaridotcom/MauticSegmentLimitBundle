# Mautic Segment Limit Bundle
This bundle allows limited movement of contacts from one segment to another.
Most common use case is to Limit the number of enrollment per campaign based on cron interval setup.

## Usage
1. clone repository
2. Install plugin in Mautic.
3. Sidemenu should be available.
4. Add Crons as provided in details below.
5. Use form to set up limit

For example if you want to set 100 contacts to be moved from segment A to segment B.
Submit the form with source with segment A and destination with segment B and Limit to 100.

On successful submission it will be listed in table below, now set up cron job for example if you want it to execute every 1 hour set:

`0 * * * * php app/console sl:changeContactSegment`

this will execute command every hour and move 100 contacts from segment A to segment B.
### Cron setup
`sl:changeContactSegment` - works for moving contact from one segment to another.

set up cron duration based on how many contacts you want to move in one execution.

## Note
This will work only with MySql as it uses Native queries based on MySql, in future releases we will try to provide a better version based on ToDos listed below.

## To Do
This is basic version which still need many improvements such as:

- Code optimization.
- Code cleaning.
- Removing mysql queries and converting in doctrine queries.
- Performance and visual optimization.