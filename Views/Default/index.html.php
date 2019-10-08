<?php
$view->extend("MauticCoreBundle:Default:content.html.php");
$view['slots']->set('headerTitle', "Set Segment Limit");
?>
<div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" method="post"
                  action="<?php echo $view['router']->path('plugin_mautic_gs_changesegment'); ?>">
                <div class="form-group source">
                    <label class="control-label col-sm-2" title="">Source Segment</label>
                    <div class="col-sm-10">
                        <select name="source_segment" class="form-control source-segment" required>
                            <option value="">Select List/Segment</option>
                            <?php
                            foreach ($lists as $list) {
                                ?>
                                <option value="<?php echo $list['id']; ?>"><?php echo $list['name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group source">
                    <label class="control-label col-sm-2" title="">Destination Segment</label>
                    <div class="col-sm-10">
                        <select name="destination_segment" class="form-control destination-segment" required>
                            <option value="">Select List/Segment</option>
                            <?php
                            foreach ($lists as $list) {
                                ?>
                                <option value="<?php echo $list['id']; ?>"><?php echo $list['name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group list-name-field">
                    <label class="control-label col-sm-2">Limit</label>
                    <div class="col-sm-10">
                        <input type="number" min="1" name="limit" required class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn-primary btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-12">
        <table class="table">
            <thead>
            <tr>
                <th>Source Segment Id</th>
                <th>Destination Segment Id</th>
                <th>Limit</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($changeSegments as $changeSegment) {
                ?>
                <tr>
                    <td><?php echo $changeSegment->getSource() ?></td>
                    <td><?php echo $changeSegment->getDestination() ?></td>
                    <td><?php echo $changeSegment->getLimit() ?></td>
                    <td>
                        <form method="POST"
                              action="<?php echo $view['router']->path('plugin_mautic_sl_deletechangesegment'); ?>">
                            <input name="idToDelete" type="hidden" value="<?php echo $changeSegment->getId() ?>"/>
                            <button type="submit"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>