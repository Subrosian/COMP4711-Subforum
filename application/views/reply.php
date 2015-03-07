<div class="reply"><form method="post" action="{submiturl}">
    Reply:<br>
    Username: <input name="username" size="18" value="{given_username}" class="replysubject" style="font-family:Courier new; width:18em;"><br>
    Subject: <input name="subject" size="40" value="Re: {subject}" class="replysubject" style="font-family:Courier new; width:40em;"><br>
    <textarea name="message" rows="15" cols="50" style="font-family:Courier new; width:50em;">{messagetxt}</textarea><br>
    <input type="submit" value="Submit reply">
    </form><br><br>
</div>
    
    Original post:<br>
    <div class="post"><a name="p{postnum}"></a>
    {subject} - Posted by {username} <img src="data/images/{avatar}" title="{username}"> at {date}:
    <p>{message}<br>
    {actions}
</div>