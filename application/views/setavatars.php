<div class="useravatars">
    <table class="useravatar"><tr><td style="width: 30%">Username</td><td style="width: 30%">Avatar</td><td></td></tr>
    {data_avatars}
        <tr>
            <td>
           {username}
           </td>
            <td>
                <img src="data/avatars/{avatar}" title="{username}">
            </td>
            <td>
                {uploadform}
                <input type="hidden" name="username" value="{username}" size="100" />
                <input type="file" name="userfile" size="100" />
                <input type="submit" value="Update" />
                </form>
            </td>
        </tr>
    {/data_avatars}
    </table>
    {message}
</div>